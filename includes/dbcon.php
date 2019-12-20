<?php;


$servername = "localhost";
$dBUseraneme = "root";
$dbPassword = "";
$dBName ="project";

$conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);

if(!conn){
    die("connection failed ".mysqli_connect_error());
}