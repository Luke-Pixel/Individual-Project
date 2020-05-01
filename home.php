<?php
session_start();
//server connection 
$servername = "localhost";
$dBUseraneme = "root";
$dbPassword = "";
$dBName ="projectdb2";

$conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);

if(!$conn){
    die("connection failed ".mysqli_connect_error());
}

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
        <!-- Navigational menu, displayed on icon click-->
          <ul>
              <li><a href="home.php">Home</a></li>
              <li><a href="viewscreenings.php">View STI Screenings</a></li>
              <li><a href="newscreening.php">Add Screening Results</a></li>
              <li><a href="viewhpv.php">View HPV Vacination</a></li>
              <li><a href="viewhep.php">View HEP A&B Vaciniation</a></li>
              <li><a href="https://www.shl.uk/" target="_blank">Order a Test Kit</a></li>
              <li><a href="https://sxt.org.uk/service" target="_blank">Find a Clinic</a></li>
              <li><a href="activities_menu.php">Resources & Activities</a></li>
              <li><a href="index.php">Logout</a></li>
              <li><a href="search.php">Search</a></li>
          </ul>
      </nav>
  </aside>
  
  </head>
<body>
      
        <main>
        
        <form class = "home_1" >
        <?php
        //select users latest screening data 
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
              <p>Add ypur STI screening results for a 
                full history of all your STI results, Well notify you when its time to test.</p>
              <?php
                $chl = 'NA';
                $gon = 'NA';
                $syph = 'NA';
                $hiv = 'NA';
              ?>
              
            <h3>Last Test</h3>
            <h4>Chlamydia:    <?php echo $row['Chlamydia'];?></h4>
            <h4>Gonnorea:     <?php echo $row['Gonnorhea'];?> </h4>
            <h4>Syphilis:     <?php echo $row['Syphilis'];?> </h4>
            <h4>HIV:          <?php echo $row['HIV'];?></h4>
              <a href="newscreening.php"  class="cta">Add STI Screening results</a>
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

    <form class = "home_1" >
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
 // retrieve user data for hpv vaccinatins and siplay on page 
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
            <h4>Dose 2: <?php echo $dose2 ?> </h4>
            <h4>Dose 3: <?php echo $dose3 ?> </h4>
            <br>
            <hr>
            <br>
            <h4>Next Dose: <?php echo $next_dose ?> </h4>
            <br>
            <hr>
    
            <br>
            <a href="viewhpv.php"  class="cta">Edit</a>
            
          <br>
          <!--  -->
         
          </main>
        </form>

        <form class = "home_1">
          <main>
          <?php
              // retrieve user data for hep vaccinatins and siplay on page 
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
            <h4>Dose 2: <?php echo $dose2 ?> </h4>
            <h4>Dose 3: <?php echo $dose3 ?> </h4>
            <br>
            <hr>
            <br>
            <h4>Next Dose: <?php echo $next_dose?> </h4>
            <br>
            <hr>
            <br>
            <a href="viewhep.php"  class="cta">Edit</a>
            
          <br>
          
         
    
         
          </main>
        </form>
         <!-- forms to provide main resources requested by client -->
        <form class = "home_1">
          <main>
          <h1>Smokefree</h1>
          <a href="https://www.nhs.uk/smokefree" target="_blank">
          <img src = "images/smokfree.jpeg" class = "SHL_Logo">
          </a>
          <p>Free, proven support to help you quit! Join the 
            millions of people who have used Smokefree support to help them stop smoking. 
            From email and text, to our free app and lots of other support, 
            you can choose what's right for you.</p>
          </main>
        </form>

        <form class = "home_1">
          <main>
          <h1>Drug Addiction </h1>
          <a href="https://www.nhs.uk/live-well/healthy-body/drug-addiction-getting-help/" target="_blank">
          <img src = "images/drug.jpg" class = "SHL_Logo">
          </a>
          <p><strong>If you need treatment for drug addiction, you're entitled to NHS care in the
             same way as anyone else who has a health problem.</strong></p>

          <p>With the right help and support, it's possible for you to get drug free and stay that way.</p>
          </main>
        </form>

        <form class = "home_1">
          <main>
          <h1>Support for people living with HIV</h1>
          <a href="https://www.tht.org.uk/" target="_blank">
          <img src = "images/THT.jpg" class = "SHL_Logo">
          </a>
          <p>Terrence Higgins Trust is a British charity that campaigns on and provides services relating to 
            HIV and sexual health. In particular, the charity aims to end the transmission of HIV in the UK; 
            to support and empower people living with HIV; to eradicate stigma and discrimination around HIV; 
            and to promote good sexual health</p>
        </main>
        </form>

        <form class = "home_1">
          <main>
          <h1>NHS Eat Well</h1>
          <a href="https://www.nhs.uk/live-well/eat-well/" target="_blank">
          <img src = "images/eat.png" class = "SHL_Logo" >
          </a>
          <p><strong> A healthy, balanced diet is an important part of maintaining good health, and can help you feel your best.</p></strong>
          <p>This means eating a wide variety of foods in the right proportions, and consuming the right amount 
            of food and drink to achieve and maintain a healthy body weight.</p>
            <p><a href="#">This page</a>  covers healthy eating advice for the general population.</p>

          </main>
        </form>

    
        
        </div>
        </main>
        <!-- Script to open and close navigation meni  -->
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
