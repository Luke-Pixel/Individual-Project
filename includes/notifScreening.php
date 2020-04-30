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

//sql to select all of users latest tetst 
$sql = 'SELECT * FROM Screening where latest_test = ? ';
$stmt = mysqli_stmt_init($conn);
//create new DateTime obbject with current date
$currentDate = new DateTime();
$currentDate->format('Y-m-d');
if(!mysqli_stmt_prepare($stmt,$sql)){
    header('Location: ../notification_test.html?error=mysqlerror_connection');
    exit();

}else{
    //bind parameters and execute sql
    $param = 1;
    mysqli_stmt_bind_param($stmt,"i",$param);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    //iterate through all rows retrieved 
    while ($row = mysqli_fetch_assoc($result)){
        $testDate = new DateTime($row['date_tested']);
        $testDate->modify('+3month');

        //store difference with last test date + 3 months and curent date 
        $difference = $currentDate->diff($testDate);
        $intdif = $difference->format("%a");
        //if dates match then send reminder email 
        if($intdif == 0){
            // send email forreminder
            //require PHP Mailer Library  
            require_once "PHP_Mailer/PHPMailerAutoload.php";
            //Read content of reminder email 
            ob_start();
            include 'screening_notif.html';
            $body = ob_get_clean();

            //send email 
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
            $mail->AddAddress($row['patient_ID']);

            $mail->Send();
        }
    }

}