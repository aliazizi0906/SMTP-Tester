<?php
require 'vendor/autoload.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $server = $_POST['server'];
    $port = $_POST['port'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $to = $_POST['to'];
    
    $subject = 'Test Email';
    $messageBody = 'This is a test email.';
    $headers = 'From: ' . $username;

    $transport = (new Swift_SmtpTransport($server, $port))
        ->setUsername($username)
        ->setPassword($password);
    
    $mailer = new Swift_Mailer($transport);
    $message = (new Swift_Message($subject))
        ->setFrom([$username])
        ->setTo([$to])
        ->setBody($messageBody);

    try {
        $result = $mailer->send($message);
        $success = $result > 0;
        $response['success'] = $success;
        $response['message'] = $success ? 'Email sent successfully!' : 'Error sending email.';
    } catch (Exception $e) {
        $response['message'] = 'Error: ' . $e->getMessage();
    }

    echo json_encode($response);
}
?>
