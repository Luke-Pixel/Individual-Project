<?php

if (isset($_POST['login-submit'])){
    require 'dbcon.php';

    $mailuid = $_POST["email"];
    $password = $_POST ["pass"];

    if (empty ($mailuid) || empty($password)){
        header("Location: ../index.html?error=emptyfields");
        exit();
    }else {
        $sql = "SELECT * FROM user WHERE email=?";
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
                    header("Location: ../index.html?error=wrongpassword");
                    exit();
                }else if($pwdCheck == true){
                    session_start();
                    $_SESSION["userID"] = $row["iduser"];
                    $_SESSION["useremail"] = $row["email"];
                    header("Location: ../index.html?login=success");
                    exit();
                }else{
                    header("Location: ../index.html?error=wrongpassword");
                }
            }else{
                header("Location: ../index.html?error=nouser");
            }
        }
    }
}else {
    header("Location: ../index.html");
    exit();
}