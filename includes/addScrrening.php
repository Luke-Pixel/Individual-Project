<?php

session_start();

if (isset($_POST['submit_screening'])){
     

$servername = "localhost";
$dBUseraneme = "root";
$dbPassword = "";
$dBName ="projectdb2";

$conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);

if(!$conn){
    header("Location: ../index.php?error=mysqlerror_connection");
    die("connection failed ".mysqli_connect_error());
}

    //variables to store entries 
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
        header("Location: ../newscreening.php?error=nochlselect");
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
        header("Location: ../newscreening.php?error=nogonselect");
        exit();
    }

    //check selection for syph
    if($_POST['Syphilis'] == 'syphilis_na'){
        $syph = 'Not Applicable';
    }else if($_POST['Syphilis'] == 'syphilis_yes'){
        $syph = 'Positive';
    }else if($_POST['Syphilis'] == 'syphilis_no'){
        $syph = 'Negative';
    }else{
        //send back to page with uncheck fields 
        header("Location: ../newscreening.php?error=nosyphselect");
        exit();
    }

    //check selection for hiv
    if($_POST['HIV'] == 'hiv_na'){
        $hiv = 'Not Applicable';
    }else if($_POST['HIV'] == 'hiv_yes'){
        $hiv = 'Positive';
    }else if($_POST['HIV'] == 'hiv_no'){
        $hiv= 'Negative';
    }else{
        //send back to page with uncheck fields 
        header("Location: ../newscreening.php?error=nohivselect");
        exit();
    }

    //retrieve date entered by user 
    //check if no date entered 
    if($_POST['date'] == ''){
        header("Location: ../newscreening.php?error=nodate");
        exit();
    }else{
        //set variable for date entered 
        $tstDate = $_POST['date'];
    }

    //sql statement to be executed,update all pre existing old records 
    $sql = 'UPDATE screening SET latest_test = ? WHERE Patient_ID = ?';
    $stmt = mysqli_stmt_init($conn);
    //if sql error return error page
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../newscreening.php?error=sqlerrorupdate");
        exit();
    }else{
        //bind parameters and execute statement 
        $latest = 0;
        mysqli_stmt_bind_param($stmt,'is',$latest,$_SESSION['ID']);
        mysqli_stmt_execute($stmt);
    }
    //add new record for new resutls entered 
    $sql = 'INSERT INTO screening VALUES (null,?,?,?,?,?,?,?)';
    $stmt2 = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt2,$sql)){
        header("Location: ../newscreening.php?error=sqlerrorinsert");
        exit();
    }else{
        $latest = 1;
        //bind parameters and execute statement 
        mysqli_stmt_bind_param($stmt2,'ssissss',$_SESSION['ID'],
        $tstDate,$latest,$gon,$chl,$syph,$hiv);
        mysqli_stmt_execute($stmt2);
    }

    header("Location: ../viewscreenings.php");
    
}