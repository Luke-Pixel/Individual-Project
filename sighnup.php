<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="sighnup.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
  </head>
<body>

    <form action="includes/sighnup.php" method="post" class="sighnup-form">
      <h1>Sign up</h1>

      <div class="txtb">
        <input type="text" name="mail">
        <span data-placeholder="Email"></span>
      </div>

      <div class="txtb">
        <input type="password" name="pass1">
        <span data-placeholder="Password"></span>
      </div>

      <div class="txtb">
        <input type="password" name = "pass2">
        <span data-placeholder="Confirm Password"></span>
      </div>

      <input type="submit" name="sighnup-submit" class="logbtn" value="Sign Up">

      <div class="bottom-text">
        Have an account? <a href="#">Log in</a>
      </div>

    </form>

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