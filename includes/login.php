<?php

if (isset($_POST['login-submit'])){
    require 'dbcon.php';

    $mailuid = $_POST["email"];
    $password = $_POST ["pass"];

    if (empty ($mailuid) || empty($password)){
        header("Location: ../index.html?error=emptyfields");
        exit();
    }else {
        $sql = 'SELECT * FROM Patient_resources WHERE category = "Sports" ';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.html?error=mysqlerror_connection");
            exit();
        }else {
            //mysqli_stmt_bind_param($stmt,"s", $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $resultCheck = mysqli_num_rows($result);
            while ($row = mysqli_fetch_assoc($result)){
                echo $row['name'] . "<br>"
                echo $row['url']
            }

        
        }
    }
}else {
    header("Location: ../index.html");
    exit();
}