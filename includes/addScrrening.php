<?php
if (isset($_POST['submit_screening'])){
     //require 'dbcon.php';

    $chl;
    $gon;
    $syph;
    $hiv;
    $tstDate;
    
    //check selection for chlym
    if(isset($_POST['Chlamydia']) == 'chlamydia_na'){
        $chl  = 'Not Applicable';
    }else if(isset($_POST['Chlamydia']) == 'chlamydia_yes'){
        $chl = 'Positive';
    }else if(isset($_POST['Chlamydia']) == 'chlamydia_no'){
        $chl = 'Negative';
    }else{
        //send back to page with uncheck fields 
        header("Location: ../newscreening.html?error=nochlselect");
        exit();
    }

    //check selection for gon
    if(isset($_POST['Gonorrhea']) == 'gonorrhea_na'){
        $gon = 'Not Applicable';
    }else if(isset($_POST['Gonorrhea']) == 'gonorrhea_yes'){
        $gon = 'Positive';
    }else if(isset($_POST['Gonorrhea']) == 'gonorrhea_no'){
        $gon = 'Negative';
    }else{
        //send back to page with uncheck fields 
        header("Location: ../newscreening.html?error=nogonselect");
        exit();
    }

    //check selection for gon
    if(isset($_POST['Syphilis']) == 'syphilis_na'){
        $syph = 'Not Applicable';
    }else if(isset($_POST['Syphilis']) == 'syphilis_yes'){
        $syph = 'Positive';
    }else if(isset($_POST['Syphilis']) == 'syphilis_na'){
        $syph = 'Negative';
    }else{
        //send back to page with uncheck fields 
        header("Location: ../newscreening.html?error=nosyphselect");
        exit();
    }

    //check selection for gon
    if(isset($_POST['HIV']) == 'hiv_na'){
        $hiv = 'Not Applicable';
    }else if(isset($_POST['HIV']) == 'hiv_yes'){
        $hiv = 'Positive';
    }else if(isset($_POST['hiv_no']) == 'hiv_no'){
        $hiv= 'Negative';
    }else{
        //send back to page with uncheck fields 
        header("Location: ../newscreening.html?error=nohivselect");
        exit();
    }

    if($_POST['date'] == ''){
        header("Location: ../newscreening.html?error=nodate");
        exit();
    }


    
}