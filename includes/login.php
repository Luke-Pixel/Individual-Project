<?php

if (isset($_POST['login-submit'])){
    $servername = "localhost";
$dBUseraneme = "root";
$dbPassword = "";
$dBName ="projectdb2";

$conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);

if(!$conn){
    header("Location: ../index.html?error=mysqlerror_connection");
    die("connection failed ".mysqli_connect_error());

}
    //retrieve email and password entered 
    $mailuid = $_POST["email"];
    $password = $_POST ["pass"];
    //if either or both fields are left empty, return error 
    if (empty ($mailuid) || empty($password)){
        header("Location: ../login_missing.php");
        exit();
    }else {
        //select from databse where ID is equal to entered email
        $sql = 'SELECT * FROM patient WHERE email = ? ';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=mysqlerror_connection");
            exit();
        }else {
            //bind parameters and execute statement 
            mysqli_stmt_bind_param($stmt,"s", $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            //if user found, retrieve stored password 
            if($row = mysqli_fetch_assoc($result)){
                $storedpass = $row ['userPass'];

                //previous code for hashed password 
                //$pwdCheck = password_verify($password, $storedpass );

                //check stored password and entered password match 
                $pwdCheck = $password == $storedpass;
                if($pwdCheck == false){
                    //if wrong password return error 
                    header("Location: ../login_wrongpass.php" );
                    exit();
                }else if($pwdCheck == true){
                    //log user in and start session 
                    session_start();
                    $_SESSION["ID"] = $row['patient_ID'];
                    $_SESSION["fNmae"] = $row['first_name'];
                    $_SESSION["sName"] = $row ['second_name']; 

                    $sql = 'SELECT * FROM interview WHERE patient_ID = ? ';
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../index.php?error=mysqlerror_checkques");
                        exit();
                    }else {
                        mysqli_stmt_bind_param($stmt,"s",$_SESSION["ID"]);
                        mysqli_stmt_execute($stmt);    
                        $result2 = mysqli_stmt_get_result($stmt);
                        if($row = mysqli_fetch_assoc($result2)){
                            //send user to home page 
                            header("Location: ../home.php");    
                        }else{
                            //send user to questions page if not completed 
                            header("Location: ../interview.php");
                        }
                    
                    }

                    //header("Location: ../index.php?errorlogin=success");
                }else{
                    header("Location: ../index.php?error=verpass");
                    exit();
                }
            }else{
                header("Location: ../login_wrongpass.php" );
                exit();
            }
        }
    }
}else {
    header("Location: ../index.php");
    exit();
}