<?php

declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/../config/config.php';

// ini_set('display_errors', '1');
// error_reporting(E_ALL);

header('Content-Type: application/json');

function response(int $code, string $message): never
{
    http_response_code($code);

    echo json_encode([
        'success' => $code < 400,
        'message' => $message
    ]);

    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    response(405, 'Method not allowed.');
}

$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$company = trim($_POST['company'] ?? '');
$services = trim($_POST['services'] ?? '');
$message = trim($_POST['message'] ?? '');
$token = trim($_POST['recaptcha_token'] ?? '');

if ($name === '' || strlen($name) > 100) {
    response(422, 'Please enter a valid name.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    response(422, 'Please enter a valid email address.');
}

if ($message === '' || strlen($message) > 3000) {
    response(422, 'Please enter a valid message.');
}

if ($token === '') response(422, 'reCAPTCHA verification is required.');

$assessmentUrl =
    'https://recaptchaenterprise.googleapis.com/v1/projects/'
    .$config['google_project_id'].'/assessments?key='.$config['google_api_key'];


$assessment = [

    'event' => [
        'token' => $token,
        'siteKey' => $config['recaptcha_site_key'],
        'userAgent' => $_SERVER['HTTP_USER_AGENT'] ?? '',
        'userIpAddress' => $ip,
        'expectedAction' => 'CONTACT',
    ]
];
$ch = curl_init($assessmentUrl);

curl_setopt_array($ch, [

    CURLOPT_POST => true,

    CURLOPT_POSTFIELDS => json_encode($assessment),

    CURLOPT_RETURNTRANSFER => true,

    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json'
    ],

    CURLOPT_TIMEOUT => 10,

]);


$googleResponse = curl_exec($ch);

$googleHttpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($googleResponse === false || $googleHttpCode < 200 || $googleHttpCode >= 300) {

error_log('Google HTTP Code: ' . $googleHttpCode);
    // error_log('Google Response: ' . $googleResponse);

    // response(
    //     500,
    //     'Google reCAPTCHA error: ' . ($googleResponse ?: 'No response')
    // );
    error_log('reCAPTCHA assessment failed.');
    response(500, 'Unable to verify CAPTCHA. Please try again.');
}

$googleResult = json_decode($googleResponse, true);
// response(200, json_encode($googleResult));

if (empty($googleResult['tokenProperties']['valid'])) {
    response(403, 'CAPTCHA verification failed.');
}

if (($googleResult['tokenProperties']['action'] ?? '') !== 'CONTACT') {
    response(403, 'CAPTCHA verification failed.');
}

$score = $googleResult['riskAnalysis']['score'] ?? 0;


if ($score < $config['recaptcha_min_score']) {
    response(403, 'Your request could not be verified.');
}
$subject = 'Trans Kontinental Contact Message';
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = $_ENV['MAIL_HOST'];
    $mail->SMTPAuth   = $_ENV['MAIL_AUTH'];
    $mail->Username   = $_ENV['MAIL_USERNAME'];
    $mail->Password   = $_ENV['MAIL_PASSWORD'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = $_ENV['MAIL_PORT'];

    $from_name = $config['company_name'];
    $from_email = $_ENV['FROM_EMAIL'];

    $mail->setFrom($email, $name);
    $mail->addAddress($from_email, $from_name);
    $mail->addReplyTo($email, $name);

    $mail->Subject = $subject;
    $mail->Body    = "Name: $name\nEmail: $email\nPhone: $phone\nCompany: $company\nService: $services\n\nMessage:\n$message";

    $mail->send();

    response(200, 'Your message has been sent successfully.');

} catch (Exception $e) {
    //  response(500, 'Mailer Error: ' . $mail->ErrorInfo);
    response(500, 'Unable to send your message. Please try again later.');
}


// $ch = curl_init('https://api.web3forms.com/submit');

// curl_setopt_array($ch, [

//     CURLOPT_POST => true,

//     CURLOPT_POSTFIELDS =>
//     json_encode($data),

//     CURLOPT_RETURNTRANSFER => true,

//     CURLOPT_HTTPHEADER => [
//         'Content-Type: application/json',
//         'Accept: application/json'
//     ],

//     CURLOPT_TIMEOUT => 10,

// ]);




// $web3Response = curl_exec($ch);

// $web3HttpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// if ($web3Response === false || $web3HttpCode < 200 || $web3HttpCode >= 300) {
//     error_log('Web3Forms request failed.');
//     response(500, 'Unable to send your message. Please try again later.');
// }

// if (
//     $web3Response === false ||
//     $web3HttpCode < 200 ||
//     $web3HttpCode >= 300
// ) {
//     error_log('Web3Forms HTTP Code: ' . $web3HttpCode);
//     error_log('Web3Forms Response: ' . $web3Response);

//     response(
//         500,
//         'Web3Forms error: ' . ($web3Response ?: 'No response')
//     );
// }

// $web3Result = json_decode(
//     $web3Response,
//     true
// );

// if (empty($web3Result['success'])) {
//     response(500, 'Unable to send your message. Please try again later.');
// }

// if (empty($web3Result['success'])) {
//     response(
//         500,
//         'Web3Forms rejected the request: ' . ($web3Response ?: 'Unknown error')
//     );
// }

// response(200,'Your message has been sent successfully.');
