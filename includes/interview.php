<?php
if (isset($_POST["submit_questions"])){
    session_start();
    $servername = "localhost";
    $dBUseraneme = "root";
    $dbPassword = "";
    $dBName ="projectdb2";

    $conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);

    if(!$conn){
        header("Location: ../index.html?error=mysqlerror_connection");
        die("connection failed ".mysqli_connect_error());
    }

    
    //variables for user selections 
    $mental;
    $pout;
    $cutdrink;
    $annoying;
    $feltbad;
    $drinkmorn;
    $clubdrug;
    $excercise;
    $smoke;
    //$currentDate = date ('Y/m/d');

    //post checkboxes to rerieve user selection 
    if ($_POST['mental_health_yes'] == "vmental_health_yes"){
        $mental = 1;
    }else{
        $mental = 0;
    }

    if ($_POST['out_yes'] == "vout_yes"){
        $out = 1;
    }else{
        $out = 0;
    }

    if ($_POST['cutdrink_yes'] == "vcutdrink_yes"){
        $cutdrink = 1;
    }else{
        $cutdrink = 0;
    }

    if ($_POST['annoying_yes'] == "vannoying_yes"){
        $annoying = 1;
    }else{
        $annoying = 0;
    }

    if ($_POST['feltbad_yes'] == "vfeltbad_yes"){
        $feltbad = 1;
    }else{
        $feltbad = 0;
    }

    if ($_POST['drinkmorn_yes'] == "vdrinkmorn_yes"){
        $drinkmorn = 1;
    }else{
        $drinkmorn = 0;
    }

    if ($_POST['clubdrug_yes'] == "vclubdrug_yes"){
        $clubdrug = 1;
    }else{
        $clubdrug = 0;
    }

    if ($_POST['excercise_yes'] == "vexcercise_yes"){
        $excercise = 1;
    }else{
        $excercise = 0;
    }

    if ($_POST['smoker_yes'] == "vsmoker_yes"){
        $smoke = 1;
    }else{
        $smoke = 0;
    }

    //sql statement to insert user selection int db
    $sql = "INSERT INTO Interview (patient_ID, happy, p_out,cut_drink,felt_guilty,drink_morning,club_drugs,smoker,excercise,annoyed)
     VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../sighnup.php?error=connectionerrorinsert&email=" .$email);
        exit();
    }else{
        //bind parameters and execute sql
        mysqli_stmt_bind_param($stmt,"siiiiiiiii",$_SESSION["ID"], $mental, $out, $cutdrink, $feltbad, $drinkmorn, $clubdrug,$smoke,$excercise,$annoying);
        mysqli_stmt_execute($stmt);
        header("Location: ../home.php");
    }
}
        





