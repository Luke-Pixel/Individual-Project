<?php

if (isset($_POST['sighnup-submit'])){
    

$servername = "localhost";
$dBUseraneme = "root";
$dbPassword = "";
$dBName ="ProjectDB2";

$conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);

if(!$conn){
    header("Location: ../index.html?error=mysqlerror_connection");
    die("connection failed ".mysqli_connect_error());
    exit();
}

    //retrieve entry from all fields by the user
    $email = $_POST['mail'];
    $password = $_POST['pass1'];
    $password2 = $_POST['pass2'];
    $name1 = $_POST['name1'];
    $name2 = $_POST['name2'];
    $birth = $_POST['DOB'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $county = $_POST['county'];
    $postcode = $_POST['postcode'];

    //check if any fields have been lft empty by the user and return error 
    if (empty($email)||empty($password)||empty($password2)||empty($name1)||
        empty($name2)||empty($birth)||empty($address1)||empty($address2)||empty($city)||
        empty($county)||empty($postcode)){
            header("Location: ../sighnup_missing.php");
            exit();
            //validate that a email has been entered 
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../sighnup_email.php");
            exit();
            //if entered passwords dont match return error 
        }else if($password != $password2){
            header("Location: ../sighnup_pass.php");
            exit();
            //check if user already exists 
        }else{
            $sql = "SELECT * FROM patient WHERE email = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../sighnup.php?error=selesctemailerror" .$email);
                exit();
            }else{
                mysqli_stmt_bind_param($stmt,"s",$email);
                mysqli_stmt_execute($stmt);    
                mysqli_stmt_store_result($stmt);     
                $resultCheck = mysqli_stmt_num_rows($stmt); 
                if($resultCheck > 0) {
                    header("Location: ../sighnup_email.php");
                    exit();
                }else{
                    //if no user exits, create new user and log in
                $sql2 = "INSERT INTO `Patient` (`patient_ID` ,`email`, `userPass`, 
                `first_name`, `second_name`,`birth`, `address1`,
                `address2`, `city`,`county`,`post_code`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                $stmt2 = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt2, $sql2)){
                    header("Location: ../sighnup.php?error=sqlerrorinsert&email=" .$email);
                    exit();
                }else{
                    //$hashedPwd = password_hash($password2, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt2,"sssssssssss",$email, $email, $password2,$name1,$name2,$birth,$address1,$address2,$city,$county,$postcode);
                    mysqli_stmt_execute($stmt2);    
                    //signup suuccesful
                    //start session and initialise users records by inserting empty rows 
                    $sql = "SELECT * FROM patient WHERE email = ?";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../sighnup.php?error=selesctemailerror" .$email);
                        exit();
                    }else{
                        mysqli_stmt_bind_param($stmt,"s",$email);
                        mysqli_stmt_execute($stmt);    
                        //mysqli_stmt_store_result($stmt); 
                        $result = mysqli_stmt_get_result($stmt);
                        if($row = mysqli_fetch_assoc($result)){
                            session_start();
                            $_SESSION["ID"] = $row['patient_ID'];
                            $_SESSION["fNmae"] = $row['first_name'];
                            $_SESSION["sName"] = $row ['second_name']; 
                           
                            $sql = "INSERT INTO `hep` (`patient_ID`,`severity`,`dose1`,`dose2`,`dose3`,`next_dose`) VALUES  (?,?,?,?,?,?)";
                            $stmt = mysqli_stmt_init($conn);  
                            if(!mysqli_stmt_prepare($stmt,$sql)){
                                header("Location: ../sighnup.php?error=hepCreate" .$email);
                                exit();
                            }else{
                                $empty = "";
                                $priority = 2;
                                mysqli_stmt_bind_param($stmt,"sissss",$_SESSION['ID'],$priority, 
                                $empty, $empty, $empty, $empty);
                                mysqli_stmt_execute($stmt);

                                $sql3 = "INSERT INTO `hpv` (`patient_ID`,`severity`,`dose1`,`dose2`,`dose3`,`next_dose`) VALUES  (?,?,?,?,?,?)";
                                $stmt3 = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt3,$sql3)){
                                    header("Location: ../sighnup.php?error=hpvCreate" .$email);
                                    exit();
                                }else{
                                    mysqli_stmt_bind_param($stmt3,"sissss",$_SESSION['ID'],$priority, 
                                    $empty, $empty, $empty, $empty);
                                    mysqli_stmt_execute($stmt3);
                                }
                            } 
                        }else{
                            header("Location: ../sighnup.php?error=sessionsCreate" .$email);
                            exit();
                        }
                    header("Location: ../interview.php" );
                    }
                    
                }
            }
        }
    }
}
 