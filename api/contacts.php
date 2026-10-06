<?php

declare(strict_types=1);


/*
|--------------------------------------------------------------------------
| Basic response helper
|--------------------------------------------------------------------------
*/

function respond(
    int $statusCode,
    string $message,
    array $extra = []
): never {

    http_response_code($statusCode);

    header('Content-Type: application/json; charset=UTF-8');

    echo json_encode(
        array_merge(
            [
                'success' => $statusCode >= 200 && $statusCode < 300,
                'message' => $message,
            ],
            $extra
        )
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| Only allow POST
|--------------------------------------------------------------------------
*/

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    respond(
        405,
        'Method not allowed.'
    );
}


/*
|--------------------------------------------------------------------------
| Load configuration
|--------------------------------------------------------------------------
*/

$config = require __DIR__ . '/../config/config.php';


/*
|--------------------------------------------------------------------------
| Get client IP
|--------------------------------------------------------------------------
|
| IMPORTANT:
|
| Do not blindly trust HTTP_X_FORWARDED_FOR unless your server is
| behind a trusted proxy that you explicitly configure.
|
*/

$ipAddress = $_SERVER['REMOTE_ADDR'] ?? 'unknown';


/*
|--------------------------------------------------------------------------
| Honeypot
|--------------------------------------------------------------------------
|
| Real users should never fill this field.
|
*/

$honeypot = trim(
    $_POST['website'] ?? ''
);

if ($honeypot !== '') {

    /*
    | Silently pretend it worked.
    | This prevents bots from learning that they were detected.
    */

    respond(
        200,
        'Your message has been sent successfully.'
    );
}


/*
|--------------------------------------------------------------------------
| Get form values
|--------------------------------------------------------------------------
*/

$name = trim(
    $_POST['name'] ?? ''
);

$email = trim(
    $_POST['email'] ?? ''
);

$message = trim(
    $_POST['message'] ?? ''
);

$recaptchaToken = trim(
    $_POST['g-recaptcha-response'] ?? ''
);


/*
|--------------------------------------------------------------------------
| Validate name
|--------------------------------------------------------------------------
*/

if ($name === '') {

    respond(
        422,
        'Please enter your name.'
    );
}

if (mb_strlen($name) > 100) {

    respond(
        422,
        'Your name is too long.'
    );
}


/*
|--------------------------------------------------------------------------
| Validate email
|--------------------------------------------------------------------------
*/

if (
    $email === '' ||
    !filter_var($email, FILTER_VALIDATE_EMAIL)
) {

    respond(
        422,
        'Please enter a valid email address.'
    );
}

if (mb_strlen($email) > 150) {

    respond(
        422,
        'Your email address is too long.'
    );
}


/*
|--------------------------------------------------------------------------
| Validate message
|--------------------------------------------------------------------------
*/

if ($message === '') {

    respond(
        422,
        'Please enter your message.'
    );
}

if (mb_strlen($message) > 3000) {

    respond(
        422,
        'Your message is too long.'
    );
}


/*
|--------------------------------------------------------------------------
| Check reCAPTCHA token exists
|--------------------------------------------------------------------------
*/

if ($recaptchaToken === '') {

    respond(
        422,
        'Please complete the CAPTCHA.'
    );
}


/*
|--------------------------------------------------------------------------
| Rate limiting
|--------------------------------------------------------------------------
|
| 5 requests per IP every 10 minutes.
|
*/

$maxAttempts = (int) $config['rate_limit_max_attempts'];

$window = (int) $config['rate_limit_window'];


/*
|--------------------------------------------------------------------------
| Create rate-limit directory
|--------------------------------------------------------------------------
*/

$rateLimitDirectory = __DIR__ . '/../storage/rate-limit';

if (!is_dir($rateLimitDirectory)) {

    mkdir(
        $rateLimitDirectory,
        0755,
        true
    );
}


/*
|--------------------------------------------------------------------------
| Create a safe filename from the IP
|--------------------------------------------------------------------------
*/

$ipHash = hash(
    'sha256',
    $ipAddress
);

$rateLimitFile =
    $rateLimitDirectory .
    '/' .
    $ipHash .
    '.json';


/*
|--------------------------------------------------------------------------
| Load existing rate-limit information
|--------------------------------------------------------------------------
*/

$rateData = [
    'attempts' => [],
];


if (file_exists($rateLimitFile)) {

    $contents = file_get_contents(
        $rateLimitFile
    );

    if ($contents !== false) {

        $decoded = json_decode(
            $contents,
            true
        );

        if (
            is_array($decoded) &&
            isset($decoded['attempts']) &&
            is_array($decoded['attempts'])
        ) {

            $rateData = $decoded;
        }
    }
}


/*
|--------------------------------------------------------------------------
| Remove expired attempts
|--------------------------------------------------------------------------
*/

$currentTime = time();

$validAttempts = [];

foreach ($rateData['attempts'] as $timestamp) {

    if (
        is_int($timestamp) &&
        $timestamp > ($currentTime - $window)
    ) {

        $validAttempts[] = $timestamp;
    }
}


/*
|--------------------------------------------------------------------------
| Check rate limit
|--------------------------------------------------------------------------
*/

if (count($validAttempts) >= $maxAttempts) {

    $oldestAttempt = min(
        $validAttempts
    );

    $retryAfter =
        ($oldestAttempt + $window) -
        $currentTime;

    if ($retryAfter < 1) {
        $retryAfter = 1;
    }

    header(
        'Retry-After: ' .
        $retryAfter
    );

    respond(
        429,
        'Too many requests. Please try again later.'
    );
}


/*
|--------------------------------------------------------------------------
| Record this attempt
|--------------------------------------------------------------------------
|
| We record before external requests so an attacker cannot bypass
| the limit by repeatedly failing CAPTCHA.
|
*/

$validAttempts[] = $currentTime;

file_put_contents(
    $rateLimitFile,
    json_encode(
        [
            'attempts' => $validAttempts,
        ]
    ),
    LOCK_EX
);


/*
|--------------------------------------------------------------------------
| Verify Google reCAPTCHA
|--------------------------------------------------------------------------
*/

$recaptchaSecret =
    $config['recaptcha_secret_key'];


/*
|--------------------------------------------------------------------------
| Send verification request to Google
|--------------------------------------------------------------------------
*/

$googleData = http_build_query(
    [
        'secret'   => $recaptchaSecret,
        'response' => $recaptchaToken,
        'remoteip' => $ipAddress,
    ]
);


$ch = curl_init(
    'https://www.google.com/recaptcha/api/siteverify'
);


curl_setopt_array(
    $ch,
    [
        CURLOPT_POST => true,

        CURLOPT_POSTFIELDS => $googleData,

        CURLOPT_RETURNTRANSFER => true,

        CURLOPT_TIMEOUT => 10,

        CURLOPT_CONNECTTIMEOUT => 5,

        CURLOPT_HTTPHEADER => [
            'Content-Type: application/x-www-form-urlencoded',
        ],
    ]
);


$googleResponse = curl_exec(
    $ch
);


$curlError = curl_error(
    $ch
);


curl_close(
    $ch
);


/*
|--------------------------------------------------------------------------
| Check Google request
|--------------------------------------------------------------------------
*/

if (
    $googleResponse === false ||
    $curlError !== ''
) {

    error_log(
        'reCAPTCHA request failed: ' .
        $curlError
    );

    respond(
        500,
        'Unable to verify CAPTCHA. Please try again.'
    );
}


/*
|--------------------------------------------------------------------------
| Decode Google response
|--------------------------------------------------------------------------
*/

$googleResult = json_decode(
    $googleResponse,
    true
);


if (
    !is_array($googleResult) ||
    !isset($googleResult['success'])
) {

    respond(
        500,
        'Invalid CAPTCHA response.'
    );
}


/*
|--------------------------------------------------------------------------
| CAPTCHA failed
|--------------------------------------------------------------------------
*/

if ($googleResult['success'] !== true) {

    respond(
        403,
        'CAPTCHA verification failed. Please try again.'
    );
}


/*
|--------------------------------------------------------------------------
| Prepare Web3Forms request
|--------------------------------------------------------------------------
*/

$web3FormsAccessKey =
    $config['web3forms_access_key'];


$web3Data = [

    'access_key' =>
        $web3FormsAccessKey,

    'name' =>
        $name,

    'email' =>
        $email,

    'message' =>
        $message,

    /*
    | This is optional depending on your Web3Forms setup.
    */

    'subject' =>
        'New Contact Form Message',

    /*
    | Optional:
    | Helps Web3Forms know which page generated the request.
    */

    'from_name' =>
        'Company Website',
];


/*
|--------------------------------------------------------------------------
| Send request to Web3Forms
|--------------------------------------------------------------------------
*/

$ch = curl_init(
    'https://api.web3forms.com/submit'
);


curl_setopt_array(
    $ch,
    [
        CURLOPT_POST => true,

        CURLOPT_POSTFIELDS =>
            json_encode($web3Data),

        CURLOPT_RETURNTRANSFER => true,

        CURLOPT_TIMEOUT => 15,

        CURLOPT_CONNECTTIMEOUT => 5,

        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Accept: application/json',
        ],
    ]
);


$web3Response = curl_exec(
    $ch
);


$web3CurlError = curl_error(
    $ch
);


$web3HttpCode = curl_getinfo(
    $ch,
    CURLINFO_HTTP_CODE
);


curl_close(
    $ch
);


/*
|--------------------------------------------------------------------------
| Check Web3Forms connection
|--------------------------------------------------------------------------
*/

if (
    $web3Response === false ||
    $web3CurlError !== ''
) {

    error_log(
        'Web3Forms request failed: ' .
        $web3CurlError
    );

    respond(
        500,
        'Unable to send your message. Please try again later.'
    );
}


/*
|--------------------------------------------------------------------------
| Decode Web3Forms response
|--------------------------------------------------------------------------
*/

$web3Result = json_decode(
    $web3Response,
    true
);


/*
|--------------------------------------------------------------------------
| Check Web3Forms result
|--------------------------------------------------------------------------
*/

if (
    $web3HttpCode < 200 ||
    $web3HttpCode >= 300
) {

    error_log(
        'Web3Forms HTTP error: ' .
        $web3HttpCode .
        ' Response: ' .
        $web3Response
    );

    respond(
        500,
        'Unable to send your message. Please try again later.'
    );
}


if (
    is_array($web3Result) &&
    isset($web3Result['success']) &&
    $web3Result['success'] === false
) {

    error_log(
        'Web3Forms rejected submission: ' .
        $web3Response
    );

    respond(
        500,
        'Unable to send your message. Please try again later.'
    );
}


/*
|--------------------------------------------------------------------------
| Success
|--------------------------------------------------------------------------
*/

respond(
    200,
    'Your message has been sent successfully.'
);