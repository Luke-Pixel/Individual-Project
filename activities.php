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
    $sports = "sport";
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
    <link rel="stylesheet" href="activities.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/f52176a8e0.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <aside>
      <figure>
          
          <figcaption>Johnny Doe</figcaption>
      </figure>
      <img src="images/menu.svg" class = "Menu_Bar">
      <nav>
          <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">View STI Screenings</a></li>
              <li><a href="#">View HPV Vacination</a></li>
              <li><a href="#">View HEP A&B Vaciniation</a></li>
              <li><a href="#">Order a Test Kit</a></li>
              <li><a href="#">Find a Clinic</a></li>
              <li><a href="#">Resources & Activities</a></li>
              <li><a href="#">Profile</a></li>
          </ul>
      </nav>
  </aside>
  
  </head>
<body>
    <div id="avatar"></div>
    <br>
    <form class = "form1">
        <?php while ($row = $result->fetch_assoc()): ?>
            <a href=<?php echo $row['url'] ?> > <?php echo $row['activity'] ?> </a> <br> <hr>
            <?php $count++; ?>
        <?php endwhile; ?>    
    
        <h1 href="#profile" class="btn"><i class="far fa-futbol"></i> Sports Activities</h1>
        <br>
       <a href="#">Gay Mens Bowling Club</a> <br> <hr>
       <a href="#">Gay Mens Football Club</a> <br> <hr>
       <a href="#">Gay Mens Bowling Club</a> <br> <hr>
       <a href="#">Gay Mens Football Club</a> <br> <hr><a href="#">Gay Mens Bowling Club</a> <br> <hr>
       <a href="#">Gay Mens Football Club</a> <br> <hr><a href="#">Gay Mens Bowling Club</a> <br> <hr>
       <a href="#">Gay Mens Football Club</a> <br> <hr>
       <a href="#">Gay Mens Bowling Club</a> <br> <hr>
       <a href="#">Gay Mens Football Club</a> <br> <hr><a href="#">Gay Mens Bowling Club</a> <br> <hr>
       <a href="#">Gay Mens Football Club</a> <br> <hr><a href="#">Gay Mens Bowling Club</a> <br> <hr>
       <a href="#">Gay Mens Football Club</a> <br> <hr>
        
    </form>
</body>