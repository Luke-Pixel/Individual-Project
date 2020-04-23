<?php

session_start();

if (isset($_POST['submit_screening'])){
     

$servername = "localhost";
$dBUseraneme = "root";
$dbPassword = "";
$dBName ="projectdb2";

$conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);

if(!$conn){
    header("Location: ../index.html?error=mysqlerror_connection");
    die("connection failed ".mysqli_connect_error());
}

    $chl;
    $gon;
    $syph;
    $hiv;
    $tstDate;
    
    //check selection for chlym
    if($_POST['Chlamydia'] == 'chlamydia_na'){
        $chl  = 'Not Applicable';
    }else if($_POST['Chlamydia'] == 'chlamydia_yes'){
        $chl = 'Positive';
    }else if($_POST['Chlamydia'] == 'chlamydia_no'){
        $chl = 'Negative';
    }else{
        //send back to page with uncheck fields 
        header("Location: ../newscreening.html?error=nochlselect");
        exit();
    }

    //check selection for gon
    if($_POST['Gonorrhea'] == 'gonorrhea_na'){
        $gon = 'Not Applicable';
    }else if($_POST['Gonorrhea'] == 'gonorrhea_yes'){
        $gon = 'Positive';
    }else if($_POST['Gonorrhea'] == 'gonorrhea_no'){
        $gon = 'Negative';
    }else{
        //send back to page with uncheck fields 
        header("Location: ../newscreening.html?error=nogonselect");
        exit();
    }

    //check selection for gon
    if($_POST['Syphilis'] == 'syphilis_na'){
        $syph = 'Not Applicable';
    }else if($_POST['Syphilis'] == 'syphilis_yes'){
        $syph = 'Positive';
    }else if($_POST['Syphilis'] == 'syphilis_no'){
        $syph = 'Negative';
    }else{
        //send back to page with uncheck fields 
        header("Location: ../newscreening.html?error=nosyphselect");
        exit();
    }

    //check selection for gon
    if($_POST['HIV'] == 'hiv_na'){
        $hiv = 'Not Applicable';
    }else if($_POST['HIV'] == 'hiv_yes'){
        $hiv = 'Positive';
    }else if($_POST['HIV'] == 'hiv_no'){
        $hiv= 'Negative';
    }else{
        //send back to page with uncheck fields 
        header("Location: ../newscreening.html?error=nohivselect");
        exit();
    }

    if($_POST['date'] == ''){
        header("Location: ../newscreening.html?error=nodate");
        exit();
    }else{
        $tstDate = $_POST['date'];
    }

    $sql = 'UPDATE screening SET latest_test = ? WHERE Patient_ID = ?';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../newscreening.html?error=sqlerrorupdate");
        exit();
    }else{
        $latest = 0;
        $patient = 1;
        mysqli_stmt_bind_param($stmt,'is',$latest,$_SESSION['ID']);
        mysqli_stmt_execute($stmt);
    }

    $sql = 'INSERT INTO screening VALUES (null,?,?,?,?,?,?,?)';
    $stmt2 = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt2,$sql)){
        header("Location: ../newscreening.html?error=sqlerrorinsert");
        exit();
    }else{
        $latest = 1;
        $patient = 1;
        mysqli_stmt_bind_param($stmt2,'ssissss',$_SESSION['ID'],
        $tstDate,$latest,$gon,$chl,$syph,$hiv);
        mysqli_stmt_execute($stmt2);
        //header("Location: ../home.php");
    }

    header("Location: ../viewscreenings.php");
    
}