<?php
if (isset($_POST["submit_questions"])){
   
    $servername = "localhost";
    $dBUseraneme = "root";
    $dbPassword = "";
    $dBName ="projectdb2";

    $conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);

    if(!$conn){
        header("Location: ../index.html?error=mysqlerror_connection");
        die("connection failed ".mysqli_connect_error());
    }

    session_start();
    //$username = $_POST [''];
    $mental = isset($_POST['mental_health_yes']);
    $pout = isset($_POST['out_yes']);
    $cutdrink = isset($_POST['cutdrink_yes']);
    $annoying = isset($_POST['annoying_yes']);
    $feltbad = isset($_POST['feltbad_yes']);
    $drinkmorn = isset($_POST['drinkmorn_yes']);
    $clubdrug = isset($_POST['clubdrug_yes']);
    $excercise = isset($_POST['excercise_yes']);
    $smoke = isset($_POST['smoke_yes']);
    //$currentDate = date ('Y/m/d');

    //$trubl = 1

    if ($mental == "mental_health_yes"){
        $mental = true;
    }else{
        $mental = false;
    }

    if ($out == "out_yes"){
        $out = true;
    }else{
        $out = false;
    }

    if ($cutdrink == "cutdrink_yes"){
        $cutdrink = true;
    }else{
        $cutdrink = false;
    }

    if ($annoying == "annoying_yes"){
        $annoying = true;
    }else{
        $annoying = false;
    }

    if ($feltbad == "feltbad_yes"){
        $feltbad = true;
    }else{
        $feltbad = false;
    }

    if ($drinkmorn == "drinkmorn_yes"){
        $drinkmorn = true;
    }else{
        $drinkmorn = false;
    }

    if ($clubdrug == "clubdrug_yes"){
        $clubdrug = true;
    }else{
        $clubdrug = false;
    }

    if ($excercise == "excercise_yes"){
        $excercise = true;
    }else{
        $excercise = false;
    }

    if ($smoke == "smoker_yes"){
        $clubdrug = true;
    }else{
        $clubdrug = false;
    }

    $sql = "INSERT INTO Interview (patient_ID, happy, p_out,cut_drink,felt_guilty,drink_morning,club_drugs,smoker,excercise,annoyed)
     VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../sighnup.php?error=connectionerrorinsert&email=" .$email);
        exit();
    }else{
        mysqli_stmt_bind_param($stmt,"iiiiiiiiii",$SESSION["ID"], $mental, $out, $cutdrink, $feltbad, $drinkmorn, $clubdrug,$smoke,$excercise,$annoying);
        mysqli_stmt_execute($stmt);
        header("Location: ../home.php");
    }
}
        






/*
    $id = $_SESSION['userid'];
    $sql = "INSERT INTO Interview (interview_id, date_completed, latest) VALUES (1,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../sighnup.php?error=connectionerrorinsert&email=" .$email);
        exit();
    }else{
        
        mysqli_stmt_bind_param($stmt,"si",$currentDate, $trubl);
        mysqli_stmt_execute($stmt);    

        $sql = "INSERT INTO Fitness VALUES (1,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../sighnup.php?error=connectionerrorinsert&email=" .$email);
        exit();
        }else{
            mysqli_stmt_bind_param($stmt,"ii",$excercise, $smoke);
            mysqli_stmt_execute($stmt);

            $sql = "INSERT INTO Alcohol VALUES (1,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../sighnup.php?error=connectionerrorinsert&email=" .$email);
            exit();
            }else{
                mysqli_stmt_bind_param($stmt,"iiiii",$cutdrink, $annoying, $feltbad, $drinkmorn, $clubdrug);
                mysqli_stmt_execute($stmt);

                $sql = "INSERT INTO Happy VALUES (1,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../sighnup.php?error=connectionerrorinsert&email=" .$email);
                exit();
                }else{
                    mysqli_stmt_bind_param($stmt,"i",$mental);
                    mysqli_stmt_execute($stmt);

                    $sql = "INSERT INTO Out VALUES (1,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../sighnup.php?error=connectionerrorinsert&email=" .$email);
                    exit();
                    }else{
                        mysqli_stmt_bind_param($stmt,"ii",$out);
                        mysqli_stmt_execute($stmt);


                    }
                }
            }
        }
    }
    */
