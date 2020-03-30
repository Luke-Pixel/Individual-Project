<?php
if (isset($_POST['hpv-submit'])){
    $servername = "localhost";
    $dBUseraneme = "root";
    $dbPassword = "";
    $dBName ="projectdb2";
    session_start();
    $conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);

    if(!$conn){
        header("Location: ../index.html?error=mysqlerror_connection");
        die("connection failed ".mysqli_connect_error());
    }
    $dateString = $_POST['date1'];
    $dateEntered = new DateTime($_POST['date1']);
    $test_date = '03/22/2010';
    $test_arr  = explode('-', $dateString);
    //validate date
    if (checkdate($test_arr[1], $test_arr[2], $test_arr[0])) {
        $sql = 'SELECT * FROM HPV WHERE patient_ID = ?';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../viewhpv.php?error=selecctHPV");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"i",$_SESSION['ID']);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $dose1 = $row['dose1'];
                $dose2 = $row['dose2'];
                $dose3 = $row['dose3'];
                if ($dose1 == ""){
                    //add first dose 
                    $nextDate = $dateEntered;
                    $nextDate->modify('+1 month');
                    $nextDateString = $nextDate->format('Y-m-d');
                    $sql = 'UPDATE HPV SET  dose1 = ? , next_dose = ? 
                    WHERE patient_ID = ?';
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        header("Location: ../viewhpv.php?error=update_dose1");
                        exit();
                    }else{
                        mysqli_stmt_bind_param($stmt,"ssi",$dateString,$nextDateString,$_SESSION['ID']);
                        mysqli_stmt_execute($stmt);
                    }

                }else if ($dose2 == ""){
                    //add second dose
                    //check new date is after old
                    $firstDate = new DateTime($dose1);
                    if($dose1 > $dateEntered){
                        //date entered is before dose 1
                        header("Location: ../viewhpv.php?error=checking_dates1");
                        exit();
                    }else {
                        $nextDate = $dateEntered;
                        $nextDate->modify('+1 month');
                        $nextDateString = $nextDate->format('Y-m-d');
                        $sql = 'UPDATE HPV SET  dose2 = ? , next_dose = ? 
                    WHERE patient_ID = ?';
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            header("Location: ../viewhpv.php?error=update_dose2");
                            exit();
                        }else{
                            mysqli_stmt_bind_param($stmt,"ssi",$dateString,$nextDateString,$_SESSION['ID']);
                            mysqli_stmt_execute($stmt);
                        }
                    }
 
                }else if($dose3 == ""){
                    //add third dose 
                    //check new date is after old
                    $firstDate = new DateTime($dose2);
                    if($dose2 > $dateEntered){
                        //date entered is before dose 1
                        header("Location: ../viewhpv.php?error=checking_dates2");
                        exit();
                    }else {
                        $nextDate = $dateEntered;
                        $nextDate->modify('+1 month');
                        $nextDateString = $nextDate->format('Y-m-d');
                        $sql = 'UPDATE HPV SET  dose3 = ? , next_dose = ? 
                    WHERE patient_ID = ?';
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            header("Location: ../viewhpv.php?error=update_dose3");
                            exit();
                        }else{
                            $na = "Not Applicable";
                            mysqli_stmt_bind_param($stmt,"ssi",$dateEntered,$nextDate,$_SESSION['ID']);
                            mysqli_stmt_execute($stmt);
                        }
                    }
                }
            }
        }
    }else{
        header("Location: ../viewhpv.php?error=dateerror");
        exit(); 
    }
    header("Location: ../viewhpv.php?error=execution_over".$_SESSION['ID']);
        exit();
}
