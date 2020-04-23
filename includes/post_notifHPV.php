<?php
$servername = "localhost";
$dBUseraneme = "root";
$dbPassword = "";
$dBName ="projectdb2";
session_start();
$conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);

if(!$conn){
    header("Location: ../index.html?error=mysqlerror_connection");
    die("connection failed ".mysqli_connect_error());
}

$sql = "SELECT * FROM HPV WHERE dose3 = ?  AND severity = 2 ";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
    exit();
}else{
    $empty = "";
    mysqli_stmt_bind_param($stmt,'s',$empty);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result)){
        $next_date_string = $row['next_dose'];
        $next_date = new DateTime ($next_date_string);
        $next_date->modify('+3month');
        $current_date = new DateTime();
        $current_date->format('Y-m-d');
        
        $difference = $current_date->diff($next_date);
        $intdif = $difference->format("%a");
        /*
        $sql2 = "UPDATE HPV SET severity = ?  WHERE patient_ID = ? ";
        $stmt2 = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt2,$sql2)){
            exit();
        }else{
            mysqli_stmt_bind_param($stmt2,'ii',$difference , $row['patient_ID']);
            mysqli_stmt_execute($stmt2);
        }
        */
        
        if ($intdif == 0){
            require_once "PHP_Mailer/PHPMailerAutoload.php";

            ob_start();
            include 'hpv_reminder_2.html';
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
            $mail->Subject = 'Time For Clinc!';
            $mail->Body = $body;
            //replace with user email
            $mail->AddAddress($row['patient_ID']);

            $mail->Send();
       
    }
    }
}