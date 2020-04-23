<?php
$servername = "localhost";
$dBUseraneme = "root";
$dbPassword = "";
$dBName ="projectdb2";
$conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);

if(!$conn){
    header("Location: ../index.html?error=mysqlerror_connection");
    die("connection failed ".mysqli_connect_error());
}


$sql = 'SELECT * FROM Screening where latest_test = ? ';
$stmt = mysqli_stmt_init($conn);
$currentDate = new DateTime();
$currentDate->format('Y-m-d');
if(!mysqli_stmt_prepare($stmt,$sql)){
    header('Location: ../notification_test.html?error=mysqlerror_connection');
    exit();

}else{
    $param = 1;
    mysqli_stmt_bind_param($stmt,"i",$param);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)){
        $testDate = new DateTime($row['date_tested']);
        $testDate->modify('+3month');
        $difference = $currentDate->diff($testDate);
        
        $intdif = $difference->format("%a");
        if($intdif == 0){
            // send email for 2 week reminder 
            require_once "PHP_Mailer/PHPMailerAutoload.php";

            ob_start();
            include 'screening_notif.html';
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
            $mail->Subject = 'Time To Get Tested';
            $mail->Body = $body;
            //replace with user email
            $mail->AddAddress($row['patient_ID']);

            $mail->Send();
        }
    }

}