<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="resources.css">
    <script src="https://kit.fontawesome.com/f52176a8e0.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>
  <div class="middle">
        <div class="menu">
          <li class="item" id='sports'>
            <a href="#profile" class="btn"><i class="far fa-futbol"></i>Sports</a>
            <div class="smenu">
              <a href="#">Gosling London Badminton</a>
              <a href="#">London Gay Boxing Club</a>
              <a href="#">London's Gay Fitness Community</a>
              <a href="#">Soho Football Club</a>
              <a href="#">Stonewall Footbball Club</a>
              <a href="#">London Gay Tennis Club</a>
              <a href="#">Gay Men's Tennis Club</a>
            </div>
          </li>
  
          <li class="item" id="messages">
            <a href="#messages" class="btn"><i class="far fa-envelope"></i>Activities</a>
            <div class="smenu">
              <a href="#">Gay Architecture Group</a>
              <a href="#">The Gay Mens Movie Meetup</a>
              <a href="#">Out4dance</a>
              <a href="#">LGBTQ Film Lovers</a>
              <a href="#">LGBTQ Film Lovers</a>
              <a href="#">LGBTQ Film Lovers</a>
              <a href="#">LGBTQ Film Lovers</a>
              <a href="#">LGBTQ Film Lovers</a>
            </div>
          </li>
  
          <li class="item" id="settings">
            <a href="#settings" class="btn"><i class="fas fa-cog"></i>Settings</a>
            <div class="smenu">
              <a href="#">Password</a>
              <a href="#">Language</a>
            </div>
          </li>
  
          <li class="item">
            <a class="btn" href="#"><i class="fas fa-sign-out-alt"></i>Logout</a>
          </li>
        </div>
      </div>

      <?php

//if (isset($_POST['login-submit'])){
    require 'includes/dbcon.php';

   
        $sql = 'SELECT * FROM Patient_rersources WHERE category = "Sports" ';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.html?error=mysqlerror_connection_resources");
            exit();
        }else {
            //mysqli_stmt_bind_param($stmt,"s", $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $resultCheck = mysqli_num_rows($result);
            while ($row = mysqli_fetch_assoc($result)){
                echo $row['name'] . "<br>";
                echo $row['url'] . "<br>";
            }

        
        
    }
/*}else {
    header("Location: ../index.html");
    exit();
}*/
?>

    

    </body>
</html>