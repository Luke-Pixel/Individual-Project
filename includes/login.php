<?php

if (isset($_POST['login-submit'])){
    require 'dbcon.php';

    $mailuid = $_POST["email"];
    $password = $_POST ["pass"];

    if (empty ($mailuid) || empty($password)){
        header("Location: ../index.html?error=emptyfields");
        exit();
    }else {
        $sql = 'SELECT * FROM user WHERE email = ? ';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.html?error=mysqlerror_connection");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt,"s", $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc()){
                $pwdCheck = password_verify($password,$row['password']);
                if($pwdCheck == false){
                    header("Location: ../index.html?error=wrongpass");
                    exit();
                }else if($pwdCheck == true){
                    //log user in
                    session_start();
                    $_SESSION["ID"] = $row['patient_ID'];
                    $_SESSION["fNmae"] = $row['first_name'];
                    $_SESSION["sName"] = $row ['second_name']; 

                    $sql = 'SELECT * FROM interview WHERE patient_ID = ? ';
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../index.html?error=mysqlerror_checkques");
                        exit();
                    }else {
                        mysqli_stmt_bind_param($stmt,"i",$_SESSION["ID"]);
                        mysqli_stmt_execute($stmt);    
                        mysqli_stmt_store_result($stmt); 
                        $result = mysqli_stmt_get_result($stmt);
                        if($row = mysqli_fetch_assoc($result)){
                            header("Location: ../home.php");    
                        }else{
                            header("Location: ../interview.php");
                        }
                    
                    }

                    header("Location: ../index.html?errorlogin=success");
                }else{
                    header("Location: ../index.html?error=verpass");
                    exit();
                }
            }
        }
    }
}else {
    header("Location: ../index.html");
    exit();
}