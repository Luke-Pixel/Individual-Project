<?php
    // location of DB
    $servername = "localhost";
    // username to authernticate 
    $dBUseraneme = "root";
    // password for DB, no password required
    $dbPassword = "";
    // name of DB to connect too 
    $dBName ="projectdb2";
    //connection to server using credentials 
    $conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);

    if(!$conn){
        //if connection failed go to login page  
        header("Location: ../index.html?error=mysqlerror_connection");
        die("connection failed ".mysqli_connect_error());
    }
    // retrieve entereed url 
    $URL = $_POST['url'];
    //validate entry is a URL 
    if (filter_var($URL, FILTER_VALIDATE_URL) !== false){
        //check for chosen category 
        if($_POST['cats'] == "Sports"){
            //SQL statement to insert row 
            $sql = "INSERT INTO `Patient_rersources` (`category`,`activity`,`url`) VALUES  (?,?,?)";
            //intitate prepared tataement 
            $stmt = mysqli_stmt_init($conn);  
            //check if statement is valid 
            if(!mysqli_stmt_prepare($stmt,$sql)){
                //return error for sql failure
                header("Location: ../test.html?error=stmt_invalid" .$url);
                exit();
            //otherwise 
            }else{
                //retrieve name and category entered 
                $categ = $_POST['cats'];
                $name = $_POST['name'];
                //bid paremeters to prepared statement and execute 
                mysqli_stmt_bind_param($stmt,"sss", $categ,$name,$URL); 
                mysqli_stmt_execute($stmt);
        }
        //Code repeated for all categories 
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