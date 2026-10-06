<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

class ContactForm {
    private array $config;

    public function __construct()
    {
        $this->config = require __DIR__ . '/../config/config.php';
    }
    
    public function send() {

        $errors = [];
        $success = [];
        
        if (isset($_POST['contact-form-btn'])) {
        
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
        
            $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $company = trim($_POST['company'] ?? '');
            $services = trim($_POST['services'] ?? '');
            $message = trim($_POST['message'] ?? '');

            verify_csrf('/contact');
        
            if ($name === '' || strlen($name) > 100) {
                $errors[] = 'Please enter a valid name.';
                $_SESSION['errors'] = $errors;
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
        
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Please enter a valid email address.';
                $_SESSION['errors'] = $errors;
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
        
            if ($message === '' || strlen($message) > 3000) {
                $errors[] = 'Please enter a valid message.';
                $_SESSION['errors'] = $errors;
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
        
            $recaptcha_v2_secret = $_ENV['RECAPTCHA_V2_SECRET'];
            $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';
        
            if (empty($recaptcha_response)) {
                $errors[] = "Please complete the CAPTCHA to send your enquiry";
                $_SESSION['errors'] = $errors;
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
        
            $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
                'secret' => $recaptcha_v2_secret,
                'response' => $recaptcha_response,
                'remoteip' => $ip,
            ]));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $verify = curl_exec($ch);
        
            $captchaResult = json_decode($verify);
            if (!$captchaResult->success) {
                $errors[] = "CAPTCHA verification failed, please try again.";
                $_SESSION['errors'] = $errors;
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
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
        
                $from_name = $this->config['company_name'];
                $from_email = $_ENV['FROM_EMAIL'];
        
                $mail->setFrom($email, $name);
                $mail->addAddress($from_email, $from_name);
                $mail->addReplyTo($email, $name);
        
                $mail->Subject = $subject;
                $mail->Body    = "Name: $name\nEmail: $email\nPhone: $phone\nCompany: $company\nService: $services\n\nMessage:\n$message";
        
                $mail->send();
        
                $success[] = 'Your message has been sent successfully.';
                $_SESSION['success'] = $success;
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
        
            } catch (Exception $e) {
                //  response(500, 'Mailer Error: ' . $mail->ErrorInfo);
                $errors[] = 'Unable to send your message. Please try again later.';
                $_SESSION['errors'] = $errors;
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }
}
