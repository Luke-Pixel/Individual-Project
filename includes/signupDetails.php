<?php

if (isset($_POST['sighnup-submit'])){
    require 'dbcon.php';

    //$username = $_POST [''];
    $name1 = $_POST['name1'];
    $name2 = $_POST['name2'];
    $birth = $_POST['DOB'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $county = $_POST['county'];
    $postcode = $_POST['postcode'];
    $id = echo $_SESSION['userid'];

    if (empty($email)||empty($password)||empty($password2)){
        header("Location: ../sighnup.php?error=emptyFields&email=" .$email);
        exit();
    }else if(validateDate($birth ) == false){
        header("Location: ../registerpatient.php?error=invaliddate");
        exit();
    }else{
        $sql = "INSERT INTO User (first_name, second_name, birth, address1, 
            address2, city, county, postcode,User_idUser) VALUES (?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../sighnup.php?error=connectionerrorinsert");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"ssssss",$email, $hashedPwd);
            mysqli_stmt_execute($stmt);  
        }
            
    }
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($conn);
} 
        

function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
    return $d && $d->format($format) === $date;
}