<?php
    session_start();
    //check button has been pressed 
if (isset($_POST['hep-submit'])){
    //
    $servername = "localhost";
    $dBUseraneme = "root";
    $dbPassword = "";
    $dBName ="projectdb2";
    $conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);
    $severity = 1;
    if(!$conn){
        header("Location: ../index.html?error=mysqlerror_connection");
        die("connection failed ".mysqli_connect_error());
    }
    // retrieve date from dataset 
    $dateString = $_POST['date1'];
    // retrieve date from dataset 
    $dateEntered = new DateTime($_POST['date1']);
    $test_date = '03/22/2010';
    $test_arr  = explode('-', $dateString);
    //validate date
    if (0==0) {
        // SQL statement to select data from user profile
        $sql = 'SELECT * FROM HEP WHERE patient_ID = ?';
        // initialise prepared ststement 
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            // if sql error occurs reolad with error 
            header("Location: ../viewhep.php?error=seleccthep");
            exit();
        }else{
            //bind parameters to prepared statement
            mysqli_stmt_bind_param($stmt,"s",$_SESSION['ID']);
            mysqli_stmt_execute($stmt);
            //store result of query 
            $result = mysqli_stmt_get_result($stmt);
            //if row is found in result 
            if($row = mysqli_fetch_assoc($result)){
                $dose1 = $row['dose1'];
                $dose2 = $row['dose2'];
                $dose3 = $row['dose3'];
                //if users first entered dose 
                if ($dose1 == ""){
                    
                    $nextDate = $dateEntered;
                    //add 1 month to date 
                    $nextDate->modify('+1 month');
                    //format date 
                    $nextDateString = $nextDate->format('Y-m-d');
                    //update row with new datat
                    $sql = 'UPDATE HEP SET  dose1 = ? , next_dose = ?, severity = ?
                    WHERE patient_ID = ?';
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        header("Location: ../viewhep.php?error=update_dose1");
                        exit();
                    }else{
                        //execute statement 
                        mysqli_stmt_bind_param($stmt,"ssis",$dateString,$nextDateString,$severity,$_SESSION['ID']);
                        mysqli_stmt_execute($stmt);
                    }
                    //repeated for 2nd and 3rd dose 
                }else if ($dose2 == ""){
                    //add second dose
                    //check new date is after old
                    $firstDate = new DateTime($dose1);
                    if($dose1 > $dateEntered){
                        //date entered is before dose 1
                        header("Location: ../viewhep.php?error=checking_dates1");
                        exit();
                    }else {
                        $nextDate = $dateEntered;
                        $nextDate->modify('+1 month');
                        $nextDateString = $nextDate->format('Y-m-d');
                        $sql = 'UPDATE HEP SET  dose2 = ? , next_dose = ?, severity = ?
                    WHERE patient_ID = ?';
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            header("Location: ../viewhep.php?error=update_dose2");
                            exit();
                        }else{

                            mysqli_stmt_bind_param($stmt,"ssis",$dateString,$nextDateString,$severity,$_SESSION['ID']);
                            mysqli_stmt_execute($stmt);
                        }
                    }
 
                }else if($dose3 == ""){
                    //add third dose 
                    //check new date is after old
                    $firstDate = new DateTime($dose2);
                    if($dose2 > $dateEntered){
                        //date entered is before dose 1
                        header("Location: ../viewhep.php?error=checking_dates2");
                        exit();
                    }else {
                        $nextDate = $dateEntered;
                        $nextDate->modify('+1 month');
                        $nextDateString = $nextDate->format('Y-m-d');
                        $sql = 'UPDATE HEP SET  dose3 = ? , next_dose = ?, severity = ?
                    WHERE patient_ID = ?';
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            header("Location: ../viewhep.php?error=update_dose3");
                            exit();
                        }else{
                            $na = "Not Applicable";
                            mysqli_stmt_bind_param($stmt,"ssis",$dateString,$na,$severity,$_SESSION['ID']);
                            mysqli_stmt_execute($stmt);
                        }
                    }
                }
            }
        }
    }else{
        header("Location: ../viewhep.php?error=dateerror");
        exit(); 
    }
    header("Location: ../viewhep.php?error=execution_over".$_SESSION['ID']);
        exit();
}
