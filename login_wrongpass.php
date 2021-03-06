<?php
  // remove all session variables
  session_unset();

  // destroy the session
  $_SESSION = array();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
  </head>
<body>

    <form action="includes/login.php" method = "post" class="login-form">
      <h1>Login</h1>
    <h4 class='msg'>Wrong email or password </h4>
      <div class="txtb">
        <input type="text" name = "email">
        <span data-placeholder="Username"></span>
      </div>

      <div class="txtb">
        <input type="password" name = "pass">
        <span data-placeholder="Password"></span>
      </div>

      <button type="submit" name = "login-submit" class="logbtn">Login</button>

      <div class="bottom-text">
        Don't have account? <a href="sighnup.php">Sign up</a>
      </div>

    </form>

    <!-- script to animate text field -->
    <script type="text/javascript">
    $(".txtb input").on("focus",function(){
      $(this).addClass("focus");
    });

    $(".txtb input").on("blur",function(){
      if($(this).val() == "")
      $(this).removeClass("focus");
    });

    </script>


</body>
</html>
