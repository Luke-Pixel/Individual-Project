<?php
require_once "PHP_Mailer/PHPMailerAutoload.php";

ob_start();
include 'checkReminder.html';
$body = ob_get_clean();

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'mshtest99@gmail.com';
$mail->Password = 'TryHard123';
$mail->SetFrom('mshtest99@gmail.com');
$mail->subject = 'Test Email';
$mail->Body = $body;
$mail->AddAddress('luke1014@live.co.uk');

$mail->Send();