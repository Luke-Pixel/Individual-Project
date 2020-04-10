<?php
session_start();

$servername = "localhost";
$dBUseraneme = "root";
$dbPassword = "";
$dBName ="projectdb2";

$conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);

if(!$conn){
    //header("Location: ../index.php?error=mysqlerror_connection");
    die("connection failed ".mysqli_connect_error());
}
/*
$sql = 'SELECT * FROM screening WHERE patient_ID = ? AND latest = ? ';
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
  //header("Location: ../index.php?error=mysqlerror_connection");
  exit();
}else {
  $latest = 1;
  mysqli_stmt_bind_param($stmt,"ii", $_SESSION['ID'], $latest);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  if($row = mysqli_stmt_get_result($stmt)){
    $chl = $row['chlamydia'];
    $gon = $row['gonnorea'];
    $syph = $row['syphilis'];
    $hiv = $row['hiv'];
  }else{
    $chl = "";
    $gon = "";
    $syph = "";
    $hiv = "";
  }
}



$sql = 'SELECT * FROM hep WHERE patient_ID = ?';
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
  //header("Location: ../index.php?error=mysqlerror_connection");
  exit();
}else {
  $latest = 1;
  mysqli_stmt_bind_param($stmt,"i", $_SESSION['ID']);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  if($row = mysqli_stmt_get_result($stmt)){
    $dose1 = $row['dose1'];
    $dose2 = $row['dose2'];
    $dose3 = $row['dose3'];
    $dose4 = $row['next_dose'];
    $hep_label = "Add Details";
  }else{
    $hep_dose1 = "";
    $hep_dose2 = "";
    $hep_dose3 = "";
    $hep_dose4 = "";
    $hep_label = "Update Details";
  }
}
   
$sql = 'SELECT * FROM hpv WHERE patient_ID = ?';
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
  //header("Location: ../index.php?error=mysqlerror_connection");
  exit();
}else {
  $latest = 1;
  mysqli_stmt_bind_param($stmt,"i", $_SESSION['ID']);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  if($row = mysqli_stmt_get_result($stmt)){
    $hpv_dose1 = $row['dose1'];
    $hpv_dose2 = $row['dose2'];
    $hpv_dose3 = $row['dose3'];
    $hpv_dose4 = $row['next_dose'];
    $hpv_label = "Add Details";
  }else{
    $hpv_dose1 = "";
    $hpv_dose2 = "";
    $hpv_dose3 = "";
    $hpv_dose4 = "";
    $hpv_label = "Update Details";
  }
}
*/
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="home.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <aside>
      <figure>
          <div id="avatar"></div>
          <figcaption> <?php echo $_SESSION["fNmae"]; echo " "; echo $_SESSION["sName"];   ?></figcaption>
      </figure>
      <img src="images/menu.svg" class = "Menu_Bar">
      <nav>
          <ul>
              <li><a href="home.php">Home</a></li>
              <li><a href="viewscreenings.php">View STI Screenings</a></li>
              <li><a href="newscreening.html">Add Screening Results</a></li>
              <li><a href="viewhpv.php">View HPV Vacination</a></li>
              <li><a href="viewhep.php">View HEP A&B Vaciniation</a></li>
              <li><a href="https://www.shl.uk/">Order a Test Kit</a></li>
              <li><a href="https://sxt.org.uk/service">Find a Clinic</a></li>
              <li><a href="resources.php">Resources & Activities</a></li>
              <li><a href="profile.html">Profile</a></li>
              <li><a href="index.php">Logout</a></li>
          </ul>
      </nav>
  </aside>
  
  </head>
<body>
      
        <main>
        
        <form class = "home_1" >
        <?php

        $sql = "SELECT * FROM screening WHERE `patient_ID` = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: ../signup.php?error=mysqlerror_connection");
          exit();
      }else{
        $sports = 1;
        mysqli_stmt_bind_param($stmt,"s", $_SESSION['ID']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = $result->fetch_assoc();
      }
      ?>

        


          <main>
              <h2>Screening History</h2>
              <p>Add ypur STI screening results for a full history of all your STI screens</p>
              <?php
                $chl = 'NA';
                $gon = 'NA';
                $syph = 'NA';
                $hiv = 'NA';
                $sql = 'SELECT * from screening Where latest = true';
                //$result = mysqli_query($conn,$sql);
                //$resultCheck = mysqli_num_rows($result);
               // if ($resultCheck > 0){
                  //test found 
                  
               // }
              ?>
              <h3>Last Test</h3>
            <h4>Chlamydia:<?php echo $row['Chlamydia'];?></h4>
            <h4>Gonnorea: <?php echo $row['Gonnorhea'];?> </h4>
            <h4>Syphilis: <?php echo $row['Syphilis'];?> </h4>
            <h4>HIV: <?php echo $row['HIV'];?></h4>
              <a href="newscreening.html"  class="cta">Add STI Screening results</a>
              <a href="viewscreenings.php"  class="cta">View More History</a>
          </main>
      </form>

        <form class = "home_1" >
        <main>

           <h2>Test at Home</h2>
            <img src = "images/SHL.png" class = "SHL_Logo">
            <p>Sexual Health London (SHL) is London’s new sexual health e-service that provides free and easy access to sexual health testing via the internet and local venues.
                    </p>

            <a href="https://www.shl.uk" target="_blank" class="cta">Order Test Kit</a>
        </main>
    </form>

    <form class = "form2" >
            <main>
    
                <h2>Find a Clinic</h2>
                <img src = "images/sxt.png" class = "SHL_Logo">
                <p> 
                  Find clinics to get tested for genital warts, herpes, gonorrhoea, syphilis, trichomoniasis (TV), pubic lice (crabs), scabies and others
                  </p>
    
                <a href="https://sxt.org.uk/service" target="_blank" class="cta">Find clinics for this service</a>
            </main>
        </form>
        
        <form class = "home_1">
        <?php
                $dose1 = 'NA';
                $dose2 = 'NA';
                $dose3 = 'NA';
                $sql = 'SELECT * from HPV ';
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0){
                  //test found 
                  
                }
              ?>
          <main>

<?php
          $sql = 'SELECT * FROM `hpv` WHERE `patient_ID` = ? ';
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
  header("Location: ../sighnup.php?error=passwordcheck&email=" .$email);
  exit();
}else{
  mysqli_stmt_bind_param($stmt,'s',$_SESSION['ID']);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  if($row = mysqli_fetch_assoc($result)){
    $dose1 = $row['dose1'];
    $dose2 = $row['dose2'];
    $dose3 = $row['dose3'];
    $next_dose = $row['next_dose']; 
  }else{
    $dose1 = 'NA';
    $dose2 = 'NA';
    $dose3 = 'NA';
    $next_dose = 'NA'; 
  }
}

?>

          <h1>HPV Status</h1>
            <br>
            <h4>Dose 1: <?php  echo $dose1?> </h4> 
            <br>
            <h4>Dose 2: <?php echo $dose2 ?> </h4>
            <br>
            <h4>Dose 3: <?php echo $dose3 ?> </h4>
            <br>
            <hr>
            <br>
            <h4>Next Dose: <?php echo $next_dose ?> </h4>
            <br>
            <hr>
    
            <br>
            <a href="viewhpv.php"  class="cta">Edit</a>
            <input  type="button" id="button" class="logbtn" value="Edit" onclick="openModal()">
          <br>
          <script>
            function openModal() {
             document.querySelector('.bg-modal').style.display = 'flex';
             
             
            }
            </script>
         
    
          </main>
        </form>

        <form class = "home_1">
          <main>
          <?php
               $sql = 'SELECT * FROM `hep` WHERE `patient_ID` = ? ';
               $stmt = mysqli_stmt_init($conn);
               if(!mysqli_stmt_prepare($stmt,$sql)){
                 header("Location: ../sighnup.php?error=passwordcheck&email=" .$email);
                 exit();
               }else{
                 mysqli_stmt_bind_param($stmt,'s',$_SESSION['ID']);
                 mysqli_stmt_execute($stmt);
                 $result = mysqli_stmt_get_result($stmt);
                 if($row = mysqli_fetch_assoc($result)){
                   $dose1 = $row['dose1'];
                   $dose2 = $row['dose2'];
                   $dose3 = $row['dose3'];
                   $next_dose = $row['next_dose']; 
                 }else{
                   $dose1 = 'NA';
                   $dose2 = 'NA';
                   $dose3 = 'NA';
                   $next_dose = 'NA'; 
                 }
               }
               
              ?>
          <h1>Hep A&B Status</h1>
            <br>  
            <h4>Dose 1: <?php echo $dose1 ?> </h4>         
            <br>
            <h4>Dose 2: <?php echo $dose2 ?> </h4>
            <br>
            <h4>Dose 3: <?php echo $dose3 ?> </h4>
            <br>
            <hr>
            <br>
            <h4>Next Dose: <?php echo $next_dose?> </h4>
            <br>
            <hr>
            <br>
            <a href="viewhep.php"  class="cta">Edit</a>
            <input  type="button" id="button" class="logbtn" value="Edit" onclick="openModal()">
          <br>
          
         
    
         
          </main>
        </form>

        <form class = "home_1">
          <main>
          <h1>Smokefree</h1>
          <p>Free, proven support to help you quit! Join the 
            millions of people who have used Smokefree support to help them stop smoking. 
            From email and text, to our free app and lots of other support, 
            you can choose what's right for you.</p>
          </main>
        </form>

        <form class = "home_1">
          <main>
          <h1>FRANK</h1>
          <img src = "images/frank.svg" class = "SHL_Logo">
          <p>Find out everything you need to know about drugs, their effects and the law. Talk to Frank for facts, 
            support and advice on drugs and alcohol today.</p>
          </main>
        </form>

        <form class = "home_1">
          <main>
          <h1>Support for people living with HIV</h1>
    
        </main>
        </form>

        <form class = "home_1">
          <main>
          <h1>NHS Eat Well</h1>

          <p><strong> A healthy, balanced diet is an important part of maintaining good health, and can help you feel your best.</p></strong>
          <p>This means eating a wide variety of foods in the right proportions, and consuming the right amount 
            of food and drink to achieve and maintain a healthy body weight.</p>
            <p><a href="#">This page</a>  covers healthy eating advice for the general population.</p>

          </main>
        </form>

    
        <div class="bg-modal">
            <div class = modal-content>
                <div class="close" onclick="closeModal()">+</div>
                <script>
                    function closeModal() {
                     document.querySelector('.bg-modal').style.display = 'none';
                    }
                    </script>
                <form>
                    <h4>Dose 1: </h4>
                    <div class = "txtb">
                        <input type="text" id="datepicker">
                        <span data-placeholder="Date Of Birth"></span>
                      </div>
                    <br>
                    <h4>Dose 2: </h4>
                    <div class = "txtb">
                        <input type="text" id="datepicker2">
                        <span data-placeholder="Date Of Birth"></span>
                      </div>
                    <br>
                    <h4>Dose 3: </h4>
                    <div class = "txtb">
                        <input type="text" id="datepicker3">
                        <span data-placeholder="Date Of Birth"></span>
                      </div>
                    <br>
    
                     <input href='#' type="submit" id="button" class="logbtn" value="Edit" onclick="openModal()">
                </form>
            </div>
        </div>
        </main>
        <script>
        
          (function() {
              var menu = document.querySelector('ul'),
                  menulink = document.querySelector('img');
              
              menulink.addEventListener('click', function(e) {
                  menu.classList.toggle('active');
                  e.preventDefault();
              });
          })();
      
      </script>
        </body> 
        <footer>
          <br>
          <br>
          <br>
        </footer>
</html>
