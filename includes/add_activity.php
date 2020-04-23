<?php
    $servername = "localhost";
    $dBUseraneme = "root";
    $dbPassword = "";
    $dBName ="projectdb2";
    $conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);

    if(!$conn){
        header("Location: ../index.html?error=mysqlerror_connection");
        die("connection failed ".mysqli_connect_error());
    }
 
    $URL = $_POST['url'];
    if (filter_var($URL, FILTER_VALIDATE_URL) !== false){
        if($_POST['cats'] == "Sports"){
            $sql = "INSERT INTO `Patient_rersources` (`category`,`activity`,`url`) VALUES  (?,?,?)";
            $stmt = mysqli_stmt_init($conn);  
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../sighnup.php?error=hepCreate" .$email);
                exit();
            }else{
                $categ = $_POST['cats'];
                $name = $_POST['name'];
                mysqli_stmt_bind_param($stmt,"sss", $categ,$name,$URL); 
                mysqli_stmt_execute($stmt);
        }
    }else if($_POST['cats'] == "Activities"){
        $sql = "INSERT INTO `Patient_rersources` (`category`,`activity`,`url`) VALUES  (?,?,?)";
        $stmt = mysqli_stmt_init($conn);  
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../sighnup.php?error=hepCreate" .$email);
            exit();
        }else{
            $categ = $_POST['cats'];
            $name = $_POST['name'];
            mysqli_stmt_bind_param($stmt,"sss", $categ,$name,$URL); 
            mysqli_stmt_execute($stmt);
    }

    }else if($_POST['cats'] == "Personal Development"){
        $sql = "INSERT INTO `Patient_rersources` (`category`,`activity`,`url`) VALUES  (?,?,?)";
        $stmt = mysqli_stmt_init($conn);  
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../sighnup.php?error=hepCreate" .$email);
            exit();
        }else{
            $categ = $_POST['cats'];
            $name = $_POST['name'];
            mysqli_stmt_bind_param($stmt,"sss", $categ,$name,$URL); 
            mysqli_stmt_execute($stmt);
    }
}else if($_POST['cats'] == "Social"){
    $sql = "INSERT INTO `Patient_rersources` (`category`,`activity`,`url`) VALUES  (?,?,?)";
    $stmt = mysqli_stmt_init($conn);  
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../sighnup.php?error=hepCreate" .$email);
        exit();
    }else{
        $categ = $_POST['cats'];
        $name = $_POST['name'];
        mysqli_stmt_bind_param($stmt,"sss", $categ,$name,$URL); 
        mysqli_stmt_execute($stmt);
    }
}else if($_POST['cats'] == "Spiritality"){
    $sql = "INSERT INTO `Patient_rersources` (`category`,`activity`,`url`) VALUES  (?,?,?)";
    $stmt = mysqli_stmt_init($conn);  
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../sighnup.php?error=hepCreate" .$email);
        exit();
    }else{
        $categ = $_POST['cats'];
        $name = $_POST['name'];
        mysqli_stmt_bind_param($stmt,"sss", $categ,$name,$URL); 
        mysqli_stmt_execute($stmt);
    }
}else if($_POST['cats'] == "Support"){
    $sql = "INSERT INTO `Patient_rersources` (`category`,`activity`,`url`) VALUES  (?,?,?)";
    $stmt = mysqli_stmt_init($conn);  
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../sighnup.php?error=hepCreate" .$email);
        exit();
    }else{
        $categ = $_POST['cats'];
        $name = $_POST['name'];
        mysqli_stmt_bind_param($stmt,"sss", $categ,$name,$URL); 
        mysqli_stmt_execute($stmt);
    }
}else if($_POST['cats'] == "Addiction"){
    $sql = "INSERT INTO `Patient_rersources` (`category`,`activity`,`url`) VALUES  (?,?,?)";
    $stmt = mysqli_stmt_init($conn);  
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../sighnup.php?error=hepCreate" .$email);
        exit();
    }else{
        $categ = $_POST['cats'];
        $name = $_POST['name'];
        mysqli_stmt_bind_param($stmt,"sss", $categ,$name,$URL); 
        mysqli_stmt_execute($stmt);
    }
}else if($_POST['cats'] == "Reading"){
    $sql = "INSERT INTO `Patient_rersources` (`category`,`activity`,`url`) VALUES  (?,?,?)";
    $stmt = mysqli_stmt_init($conn);  
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../sighnup.php?error=hepCreate" .$email);
        exit();
    }else{
        $categ = $_POST['cats'];
        $name = $_POST['name'];
        mysqli_stmt_bind_param($stmt,"sss", $categ,$name,$URL); 
        mysqli_stmt_execute($stmt);
    }
}
    }else{
        header('test.php');
    }