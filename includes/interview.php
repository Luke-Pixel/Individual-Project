<?php
if (isset($_POST['sighnup-submit'])){
    require 'dbcon.php';

    //$username = $_POST [''];
    $mental = isset($_POST['mental_health_yes']);
    $out= isset($_POST['out_yes']);
    $cutdrink = isset($_POST['cutdrink_yes']);
    $annoying = isset($_POST['annoying_yes']);
    $feltbad = isset($_POST['feltbad_yes']);
    $drinkmorn = isset($_POST['drinkmorn_yes']);
    $clubdrug = isset($_POST['clubdrug_yes']);
    $excercise = isset($_POST['excercise_yes']);
    $smoke = isset($_POST['smoke_yes']);
    $currentDate = date ('Y/m/d');

    $id = echo $_SESSION['userid'];
    $sql = "INSERT INTO Interview (interview_id, date_completed, latest) VALUES (1,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../sighnup.php?error=connectionerrorinsert&email=" .$email);
        exit();
    }else{
        
        mysqli_stmt_bind_param($stmt,"si",$currentDate, True);
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
                mysqli_stmt_bind_param($stmt,"ii",$excercise, $smoke);
                mysqli_stmt_execute($stmt);

                $sql = "INSERT INTO Happy VALUES (1,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../sighnup.php?error=connectionerrorinsert&email=" .$email);
                exit();
                }else{
                    mysqli_stmt_bind_param($stmt,"ii",$excercise, $smoke);
                    mysqli_stmt_execute($stmt);

                    $sql = "INSERT INTO Happy VALUES (1,?)";
                    $stmt = mysqli_stmt_init($conn);
                }
            }
        }
    }
}
