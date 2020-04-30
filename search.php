<?php
session_start();
//database connection 

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

    <form class="project-form" action="includes/search.php" method="post"> 
        <h1>Search</h1>
            <br>
            <h4>Email: </h4>
            <div class = "txtb">
                <input type="text" name = 's_email'  >
                <span data-placeholder="Email"></span>
            </div>
            
        
<br>
<button type="submit" name = "login-submit" class="logbtn">Search</button>
  
    
  </form>
    
           
  </body>
  <!--Script to show and hide navigational menu-->
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
<!-- script to animate textfield-->
<script type="text/javascript">
$(".txtb input").on("focus",function(){
  $(this).addClass("focus");
});

$(".txtb input").on("blur",function(){
  if($(this).val() == "")
  $(this).removeClass("focus");
});
</script>
</form>




</html>
