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

    //$username = $_POST [''];
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

    if (empty($email)||empty($password)||empty($password2)||empty($name1)||
        empty($name2)||empty($birth)||empty($address1)||empty($address2)||empty($city)||
        empty($county)||empty($postcode)){
            header("Location: ../sighnup.php?error=emptyFields&email=" .$email);
            exit();
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../sighnup.php?error=invalidemail");
            exit();
        }else if($password != $password2){
            header("Location: ../sighnup.php?error=passwordcheck&email=" .$email);
            exit();
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
                    header("Location: ../sighnup.php?error=userExists");
                    exit();
                }else{
                $sql2 = "INSERT INTO `Patient` (`email`, `userPass`, `first_name`, `second_name`,`birth`, `address1`,`address2`, `city`,`county`,`post_code`) VALUES (?,?,?,?,?,?,?,?,?,?)";
                $stmt2 = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt2, $sql2)){
                    header("Location: ../sighnup.php?error=sqlerrorinsert&email=" .$email);
                    exit();
                }else{
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt2,"ssssssssss",$email, $hashedPwd,$name1,$name2,$birth,$address1,$address2,$city,$county,$postcode);
                    mysqli_stmt_execute($stmt2);    
           
                    
                    //signup suuccesful

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
                        }else{
                            header("Location: ../sighnup.php?error=sessionsCreate" .$email);
                            exit();
                        }
                    header("Location: ../interview.html" );
                    }
                    
                }
            }
        }
    }
}
    
 /*
    if (empty($email)||empty($password)||empty($password2)){
        header("Location: ../sighnup.php?error=emptyFields&email=" .$email);
        exit();
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../sighnup.php?error=invalidemail");
        exit();
    }else if($password !== $password2){
        header("Location: ../sighnup.php?error=passwordcheck&email=" .$email);
        exit();
    }else{

        $sql = "SELECT email from User WHERE email = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../sighnup.php?error=connectionerrorselect&email=" .$email);
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);    
            mysqli_stmt_store_result($stmt);     
            $resultCheck = mysqli_stmt_num_rows($stmt); 
            if($resultCheck > 0) {
                header("Location: ../sighnup.php?error=userExists");
                exit();
            }else{
                $sql = "INSERT INTO User (email, userPass) VALUES (?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../sighnup.php?error=connectionerrorinsert&email=" .$email);
                    exit();
                }else{
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"ss",$email, $hashedPwd);
                    mysqli_stmt_execute($stmt);    
                    //header("Location: ../sighnup.php?signupsucc" .$email); 
                    
                    //get user id and email and continue registation
                    $sql = "SELECT email from User WHERE email = ?";
                    $stmt = mysqli_stmt_init($conn);

                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../sighnup.php?error=errorgetID&email=" .$email);
                        exit();
                    }else{
                        mysqli_stmt_bind_param($stmt,"s",$email);
                        mysqli_stmt_execute($stmt);    
                        $result = mysqli_stmt_get_result($stmt);  
                    }
                    session_start();
                    $_SESSION['id'] = $row['idUser'];
                    $_SESSION['contact'] = $row['email'];
                    
                    header("Location: ../registerpatient.php");
                    exit();
                }
            }
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($conn);

}else {
    header("Location: ../sighnup.php?wrongaccess");
    exit();
}*/
