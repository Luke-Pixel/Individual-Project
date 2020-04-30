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

$sql = "SELECT * FROM Patient WHERE email = ?   ";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
    exit();
}else{
    
    mysqli_stmt_bind_param($stmt,'s',$_SESSION['s_email']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="main.css">
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
              <li><a href="newscreening.php">Add Screening Results</a></li>
              <li><a href="viewhpv.php">View HPV Vacination</a></li>
              <li><a href="viewhep.php">View HEP A&B Vaciniation</a></li>
              <li><a href="https://www.shl.uk/" target="_blank">Order a Test Kit</a></li>
              <li><a href="https://sxt.org.uk/service" target="_blank">Find a Clinic</a></li>
              <li><a href="activities_menu.php">Resources & Activities</a></li>
              <li><a href="index.php">Logout</a></li>
          </ul>
      </nav>
  </aside>
  
  </head>
<body>

        
    <form class = "home_1">
       
        <main>

        <h1> <?php echo $row['first_name']." " .$row['second_name'] ?></h1>
            <p> <?php echo $row['email'] ?></p>
            <p> <?php echo $row['address1'] ?></p> 
                  
            <p> <?php echo $row['county'] ?></p>  
            <p> <?php echo $row['post_code'] ?></p>  
            <h4> <?php echo 'DOB: '.$row['birth'] ?></h4>        
            <hr>
<?php
//retrieve all of the users hpv vaccination details and display
          $sql = 'SELECT * FROM `hpv` WHERE `patient_ID` = ? ';
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
  header("Location: ../sighnup.php?error=passwordcheck&email=" .$email);
  exit();
}else{
  mysqli_stmt_bind_param($stmt,'s',$_SESSION['s_email']);
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
    $next_dose = $_SESSION['s_email']; 
  }
}
?>
          <h2>HPV Status</h2>
           
            <h4>Dose 1: <?php  echo $dose1?> </h4> 
            
            <h4>Dose 2: <?php echo $dose2 ?> </h4>
            
            <h4>Dose 3: <?php echo $dose3 ?> </h4>
            
            <hr>
            
            <h4>Next Dose: <?php echo $next_dose ?> </h4>
            
            <hr>
    
            
            
         
          
         
    
          </main>
        </form>

        <form class = "home_1" action="includes/message_user.php" method="post">
          <main>
          <?php
          //retrieve all of the users hep vaccination details and display
               $sql = 'SELECT * FROM `hep` WHERE `patient_ID` = ? ';
               $stmt = mysqli_stmt_init($conn);
               if(!mysqli_stmt_prepare($stmt,$sql)){
                 header("Location: ../sighnup.php?error=passwordcheck&email=" .$email);
                 exit();
               }else{
                 mysqli_stmt_bind_param($stmt,'s',$_SESSION['s_email']);
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
          <h2>Hep A&B Status</h2>
            
            <h4>Dose 1: <?php echo $dose1 ?> </h4>         
            
            <h4>Dose 2: <?php echo $dose2 ?> </h4>
            
            <h4>Dose 3: <?php echo $dose3 ?> </h4>
            
            <hr>
            
            <h4>Next Dose: <?php echo $next_dose?> </h4>
            
            <hr>
            <br>
           
            
          <br>
          <!-- allows user to send patient message -->
<h1>Contact</h1>
<textarea id="message_box" rows="14" cols="50" name="email_text" data-placeholder='Text Here'>
Enter Message Here...
</textarea>
<br>
<br>
<button type="submit" name = "login-submit" class="logbtn">Message User </button>
<br>
          <?php
          //retrieve all of the users screening result details and display
          $sql = "SELECT * FROM screening WHERE `patient_ID` = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../signup.php?error=mysqlerror_connection");
        exit();
    }else{
        $sports = 1;
        mysqli_stmt_bind_param($stmt,"s", $_SESSION['s_email']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
    }
?>


            <?php while ($row = $result->fetch_assoc()): ?>
            <hr>
           
            <h4>TST#<?php echo $row['screening_ID'] ?></h4>
                     
             Date: <?php echo $row['date_tested'] ?> <br>
             <h4>Chlamydia: <?php echo $row['Chlamydia'] ?> </h4>
             <h4>Gonnorea: <?php echo $row['Gonnorhea'] ?> </h4>
             <h4>Syphilis: <?php echo $row['Syphilis'] ?> </h4>
             <h4>HIV: <?php echo $row['HIV'] ?></h4>
            
      <?php endwhile; ?>
         
    <!-- script to display and hide naviagational menu -->
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
          </main>
        </form>