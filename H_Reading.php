<?php
session_start();
$count = 0;

$servername = "localhost";
$dBUseraneme = "root";
$dbPassword = "";
$dBName ="projectdb2";

$conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);

if(!$conn){
    header("Location: ../index.html?error=mysqlerror_connection");
    die("connection failed ".mysqli_connect_error());
}

$sql = "SELECT * FROM patient_rersources WHERE `category` = ?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
    header("Location: ../signup.php?error=mysqlerror_connection");
    exit();
}else{
    $sports = "Reading";
    mysqli_stmt_bind_param($stmt,"s", $sports);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="activities.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/f52176a8e0.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <aside>
      <figure>
          
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
              <li><a href="https://www.shl.uk/">Order a Test Kit</a></li>
              <li><a href="https://sxt.org.uk/service">Find a Clinic</a></li>
              <li><a href="resources.php">Resources & Activities</a></li>
              <li><a href="index.php">Logout</a></li>
          </ul>
      </nav>
  </aside>
  
  </head>
<body>
    <div id="avatar"></div>
    
    <form class = "form1">
        <h1 href="#profile" class="btn"><i class="fas fa-book"></i> Reading</h1>
        <br>
        <?php while ($row = $result->fetch_assoc()): ?>
            <a href=<?php echo $row['url'] ?> class='cta' > <?php echo $row['activity'] ?>  </a> <br> <hr>
            <?php $count++; ?>
        <?php endwhile; ?>    
    </form>

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