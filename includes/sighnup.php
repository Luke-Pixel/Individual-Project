<?php

if (isset($_POST['sighnup-submit'])){
    require 'dbcon.php';

    //$username = $_POST [''];
    $email = $_POST['mail'];
    $password = $_POST['pass1'];
    $password2 = $_POST['pass2'];
    

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
}