<?php
require 'dbcon.php';

    $mailuid = $_POST["email"];
    $password = $_POST ["pass"];

    $sql = "SELECT * FROM reminderData WHERE severity = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.html?error=mysqlerror_connection");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt,"s", 1 );
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            