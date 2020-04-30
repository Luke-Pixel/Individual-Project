<?php
session_start();
require_once "PHP_Mailer/PHPMailerAutoload.php";

$body = $_POST['email_text'];
$email_to_send = $_SESSION['s_email'];
//send email 
$mail = new PHPMailer(); 
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
//$mail->isHTML();
$mail->Username = 'mshtest99@gmail.com';
$mail->Password = 'TryHard123';
$mail->SetFrom('mshtest99@gmail.com');
$mail->Subject = 'NHS no reply';
$mail->Body = $body;
//replace with user email
$mail->AddAddress($email_to_send);

$mail->Send();

header("Location: ../searched_user.php");
