<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendEmailReport($userEmail, $reportData) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@example.com';
        $mail->Password = 'your-email-password';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('your-email@example.com', 'Income & Expense Tracker');
        $mail->addAddress($userEmail);
        
        $mail->isHTML(true);
        $mail->Subject = 'Your Income & Expense Report';
        $mail->Body    = '<h3>Your Report Summary</h3><p>' . $reportData . '</p>';
        
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>