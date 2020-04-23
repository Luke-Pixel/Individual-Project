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
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="activities2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
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

  <form class="project-form"> 
    <h1>Resources For Gay Men In London</h1>
    <br>
   
            <p>The majority of these resources 
                are specifically addressed to the 
                gay man, although some of them can also 
                be an alternative to other members the 
                community. I want to emphasise that the 
                purpose of this list is to provide the 
                biggest possible support, specifically, 
                for a gay man, particularly vulnerable 
                to isolation, and victim in many cases of 
                rejection and homophobia from a very young age.</p>
  <br>
                <p>Ignacio Labayen de Inza - April 2019</p> 
<br>
    <a href="H_Sport.php"  class="cta">Sports</a>
    <a href="H_Activities.php" class="cta">Activities</a>
    <a href="H_Social.php"  class="cta">Social & Dating</a>
    <a href="H_Personal.php"  class="cta">Personal Development</a>
    <a href="H_Spiritual.php"  class="cta">Spirituality</a>
    <a href="H_Support.php"  class="cta">Support</a>
    <a href="H_Addiction.php"  class="cta">Addiction</a>
    <a href="H_Reading.php" class="cta">Reading</a>
  </form>
    
           
  </body>
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
</html>
