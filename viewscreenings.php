<?php
session_start();
//DB connection 
$servername = "localhost";
$dBUseraneme = "root";
$dbPassword = "";
$dBName ="projectdb2";

$conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);

if(!$conn){
    header("Location: ../index.html?error=mysqlerror_connection");
    die("connection failed ".mysqli_connect_error());
}

// select screeneing result data for user 
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
    
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="viewscreenings.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Script for JQuery DatePickert-->
    <script>
        $( function() {
        $( "#datepicker" ).datepicker();
        } );
    </script>
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
        
        <!-- display results from query-->
        <form action="includes/interview.php" method="post" class="project-form">
            <h1>Results</h1> <br>
            <?php while ($row = $result->fetch_assoc()): ?>
            <hr>
            <br>
            <h4>TST#<?php echo $row['screening_ID'] ?></h4>
            <br>          
             Date: <?php echo $row['date_tested'] ?> <br>
             <h4>Chlamydia: <?php echo $row['Chlamydia'] ?> </h4>
             <h4>Gonnorea: <?php echo $row['Gonnorhea'] ?> </h4>
             <h4>Syphilis: <?php echo $row['Syphilis'] ?> </h4>
             <h4>HIV: <?php echo $row['HIV'] ?></h4>
             <br>
      <?php endwhile; ?>
            <hr>            
        </form>
    
       
<!-- Script to display and hide navigational menu-->
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
    </html>