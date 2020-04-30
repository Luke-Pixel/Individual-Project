<?php
$servername = "localhost";
$dBUseraneme = "root";
$dbPassword = "";
$dBName ="projectdb2";
$conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);
session_start();
$_SESSION ['s_email'] = $_POST['s_email'];

$sql = " SELECT * FROM Patient WHERE email  = ?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
    header("Location: ../search_results.php");
}else{
    mysqli_stmt_bind_param($stmt,"s",$_SESSION['s_email']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($result)){
        header("Location: ../searched_user.php");
    }else{
        header("Location: ../search_fail.php");
    }
}

