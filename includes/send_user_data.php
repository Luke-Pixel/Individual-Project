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

    $happy = 0;
    $out = 0;
    $cut = 0;
    $guilt = 0;
    $morn = 0;
    $drug = 0;
    $smoker = 0;
    $excercise = 0;
    $anoy = 0;
    $count = 0;
$sql = "SELECT * FROM Interview";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
    exit();
}else{
    $empty = "";
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result)){
        if($row['happy'] == 1){
            $happy++;
        }
        if($row['p_out'] == 1){
            $out++;
        }
        if($row['cut_drink'] == 1){
            $cut++;
        }
        if($row['felt_guilty'] == 1){
            $guilt++;
        }
        if($row['drink_morning'] == 1){
            $morn++;
        }
        if($row['club_drugs'] == 1){
            $happy++;
        }
        if($row['smoker'] == 1){
            $smoker++;
        }
        if($row['excercise'] == 1){
            $excercise++;
        }
        if($row['annoyed'] == 1){
            $anoy++;
        }
        $count++;
    }
    $p_happy = ($happy*100)/$count;
    $p_out = ($out*100)/$count;;
    $p_cut = ($cut*100)/$count;
    $p_guilt = ($guilt*100)/$count;
    $p_morn = ($morn*100)/$count;
    $p_drug = ($drug*100)/$count;;
    $p_smoker = ($smoker*100)/$count;;
    $p_excercise = ($excercise*100)/$count;
    $p_anoy = ($anoy*100)/$count;
    

    $gon = 0;
    $chly = 0;
    $syph = 0;
    $hiv = 0;

    $today_dt = new DateTime();
    $today_dt->format('Y-m-d');
    $today_dt->modify('-3month');
    $sql = "SELECT * FROM Screening";
    $stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
    exit();
}else{
    $empty = "";
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result)){
        
        $test_dt = new DateTime($row['date_tested']);
        $test_dt->format('Y-m-d');
        if($today_dt < $test_dt){
            if($row['Gonnorhea'] == 'Positive'){
                $gon++;
            }
            if($row['Chlamydia'] == 'Positive'){
                $chly++;
            }
            if($row['Syphilis'] == 'Positive'){
                $syph++;
            }
            if($row['HIV'] == 'Positive'){
                $hiv++;
            }
        }
    }

    require_once "PHP_Mailer/PHPMailerAutoload.php";

            ob_start();
            include 'hep_reminder_2.html';
            

            $message = "<!DOCTYPE html>";
            $message .= '<html lang="en" dir="ltr">';
            $message .=   '<head>';
            $message .= '<meta charset="utf-8">';
            $message .= '<title></title>';
                
            $message .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>';
            $message .= '<script src="https://kit.fontawesome.com/f52176a8e0.js" crossorigin="anonymous"></script>';
            $message .= '</head>';
            $message .= '<body>';
            $message .= '<style>';
            $message .= '@import url("https://fonts.googleapis.com/css?family=Montserrat:400,700");';
            
            
            $message .= '*{';
                $message .= 'margin: 0;';
                $message .= 'padding: 0;';
                $message .= 'text-decoration: none;';
                $message .= 'font-family: montserrat;';
                $message .= 'box-sizing: border-box;';
                $message .= '}';
              
                $message .= 'body{';
                    $message .= 'min-height: 100vh;';
                    $message .= 'background-color: #EB3A70;';
                    $message .= '}';
            
                    $message .= 'form{';
                        $message .= 'width: 360px;';
                        $message .= 'background: #f1f1f1;';
                
                        $message .= 'padding: 80px 40px;';
                        $message .= 'border-radius: 10px;';
                        $message .= 'position: absolute;';
                        $message .= 'left: 50%;';
                        $message .= 'top: 50%;';
                        $message .= 'transform: translate(-50%,-50%);';
                        $message .= '}';
            
                        $message .= '.fas{';
                            $message .= 'color: #EB3A70;';
                            $message .= '}';
                            $message .= '</style>';
                $message .= '<form>';
                $message .= '<h1>Monthly User Dashboard <i class="fas fa-syringe"></i></h1>';
                $message .= '<br>';
                $message .= 'The below data presents the details of all users:';
                $message .= '<br><br>';
                $message .= 'Users with diagnoed with a mental health condition: ' .$p_happy;
                $message .= '<br><br>';
                $message .= 'Out to family and friends: ' .$p_out;
                $message .= '<br><br>';
                $message .= 'Want to cut down on drinking: ' .$p_cut;
                $message .= '<br><br>';
                $message .= 'Take club drugs: ' .$p_drug;
                $message .= '<br><br>';
                $message .= 'Are a smoker: ' .$p_smoker;
                $message .= '<br><br>';
                $message .= 'Excercise regualrly: ' .$p_excercise ;
                $message .= '<br><br>';
                $message .= 'Positive Test Results seen in the last 3 months:';
                $message .= '<br>';
                $message .= 'Chlamydia: ' .$chly; 
                $message .= '<br>';
                $message .= 'Gonnorhea: ' .$gon;
                $message .= '<br>';
                $message .= 'Syphillis: ' .$syph;
                $message .= '<br>';
                $message .= 'HIV: ' .$hiv;
                $message .= '</form>';
                
                
                $message .= '</body>';


             

    
    
            

            $mail = new PHPMailer(); 
            $mail->Body = $message;
            $mail->isHTML(true);
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
            
            //replace with user email
            $mail->AddAddress('lukeool76@gmail.com');

            $mail->Send();

    }
}
