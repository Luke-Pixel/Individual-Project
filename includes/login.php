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

    $mailuid = $_POST["email"];
    $password = $_POST ["pass"];

    if (empty ($mailuid) || empty($password)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }else {
        $sql = 'SELECT * FROM patient WHERE email = ? ';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=mysqlerror_connection");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt,"s", $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $storedpass = $row ['userPass'];
                //$pwdCheck = password_verify($password, $storedpass );
                $pwdCheck = $password == $storedpass;
                if($pwdCheck == false){
                    header("Location: ../index.php?error=wrongpass" .$password );
                    exit();
                }else if($pwdCheck == true){
                    //log user in
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
                        mysqli_stmt_bind_param($stmt,"i",$_SESSION["ID"]);
                        mysqli_stmt_execute($stmt);    
                        mysqli_stmt_store_result($stmt); 
                        $result = mysqli_stmt_get_result($stmt);
                        if($row = mysqli_fetch_assoc($result)){
                            header("Location: ../home.php");    
                        }else{
                            header("Location: ../interview.php");
                        }
                    
                    }

                    //header("Location: ../index.php?errorlogin=success");
                }else{
                    header("Location: ../index.php?error=verpass");
                    exit();
                }
            }else{
                header("Location: ../index.php?error=noemail");
                exit();
            }
        }
    }
}else {
    header("Location: ../index.php");
    exit();
}