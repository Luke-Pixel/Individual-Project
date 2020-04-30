
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

//sql stattement to retrieve all records for users 
$sql = "SELECT * FROM HPV WHERE dose3 = ?  AND severity = 1 ";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
    exit();
}else{
    //bind parameters and execute statement 
    $empty = "";
    mysqli_stmt_bind_param($stmt,'s',$empty);
    mysqli_stmt_execute($stmt);
    //store result retrieved 
    $result = mysqli_stmt_get_result($stmt);
    //iterate through all records 
    while($row = mysqli_fetch_assoc($result)){
        //retrieve next required date for user
        $next_date_string = $row['next_dose'];
        $next_date = new DateTime ($next_date_string);
        //create DateTime object with current date 
        $current_date = new DateTime();
        $current_date->format('Y-m-d');
        //calculate difference between dates
        $difference = $current_date->diff($next_date);
        $intdif = $difference->format("%R%a");
       
        //if difference is between 2 weeks send an email to user 
        if ($intdif  == +14){
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
            
            $mail->AddAddress($row['patient_ID']);

            $mail->Send();
            header('Location: ../test.html?error=end'. $intdif);
        }else if ($intdif == -14 ){
            // send email for 2 week reminder 
            require_once "PHP_Mailer/PHPMailerAutoload.php";

            ob_start();
            include 'hpv_reminder.html';
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
            
            $mail->AddAddress($row['patient_ID']);

            $mail->Send();
            header('Location: ../test.html?error=end'. $intdif);

            // if more than 14 days have past then set priority to 2
        }else if ($intdif < -14){

            $sql = "UPDATE HPV SET severity = ?  WHERE patient_ID = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header('Location: ../notification_test.html?error=mysqlerror_connection');
                exit();
            }else{
                $ID = $row['patient_ID']; 
                $sev = 2;
                mysqli_stmt_bind_param($stmt,'is', $sev, $ID);
                mysqli_stmt_execute($stmt);
                header('Location: ../test.html?error=end'. $intdif);
            }
        }else {
            header('Location: ../test.html?error=end'. $intdif);
        }
    }
}

?>
