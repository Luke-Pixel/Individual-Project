<?php


if (isset($_POST['hpv-submit'])){
    require 'dbcon.php';
    
    $vaccineDate = new DateTime($_POST['date1']);

    $sql = 'INSERT INTO HPV values() ';
    $stmt = mysqli_stmt_init($conn);
    $currentDate = new DateTime();

    $sql = 'SELECT * FROM HPV WHERE id = 1 && latest == "true" '


    if(!mysqli_stmt_prepare($stmt,$sql)){
        exit();
}else{
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) == 0){
        $sql = 'INSERT INTO HPV (ID, dose1, ) VALUES (?,?,?) '
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../sighnup.php?error=connectionerrorselect&email=" .$email);
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);
        }
    }else{
        if($row['dose2'] == null){
            $sql = 'INSERT INTO HPV (ID, dose1, ) VALUES (?,?,?) '
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../sighnup.php?error=connectionerrorselect&email=" .$email);
                exit();
            }else{
                mysqli_stmt_bind_param($stmt,"s",$email);
                mysqli_stmt_execute($stmt);
            }
        }else if ($row['dose3'] == null){
            if($row['dose2'] == null){
                $sql = 'INSERT INTO HPV (ID, dose1, ) VALUES (?,?,?) '
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../sighnup.php?error=connectionerrorselect&email=" .$email);
                    exit();
                }else{
                    mysqli_stmt_bind_param($stmt,"s",$email);
                    mysqli_stmt_execute($stmt);
                }
            }
        }
    }
