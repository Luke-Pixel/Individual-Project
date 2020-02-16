<?php
//TODO, RECHECH DATE TYPE, CHANGE EMAIL TO USERS EMAIL
require 'dbcon.php';

$sql = 'SELECT * FROM screen_Data where latest = "True" ';
$stmt = mysqli_stmt_init($conn);
$currentDate = new DateTime();
if(!mysqli_stmt_prepare($stmt,$sql)){

    exit();
}else{
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $resultCheck = mysqli_num_rows($result);

    while ($row = mysqli_fetch_assoc($result)){
        $testDate = new DateTime($row['testDate']);
        $difference = $currentDate->diff($testDate);
        if ($difference->d == 14){
            // send email for 2 week reminder 
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
            //replace with user email
            $mail->AddAddress('luke1014@live.co.uk');

            $mail->Send();
        }else if($difference->d == 7){
            // send email for 1 week reminder 
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
            //replace with user email
            $mail->AddAddress('luke1014@live.co.uk');

            $mail->Send();
        }
    }
}