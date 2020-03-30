<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="sighnup.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
        $( "#datepicker" ).datepicker();
        } );
    </script>
  </head>
<body>

    <form action="includes/sighnup.php" method="post" class="sighnup-form">
      <h1>Sign up</h1>

      <div class="txtb">
        <input type="text" name="mail">
        <span data-placeholder="Email"></span>
      </div>

      <div class="txtb">
        <input type="text" name="name1">
        <span data-placeholder="First Name"></span>
      </div>

      <div class="txtb">
        <input type="text" name="name2">
        <span data-placeholder="Surname"></span>
      </div>

      <div class="txtb">
        <input type="password" name="pass1">
        <span data-placeholder="Password"></span>
      </div>

      <div class="txtb">
        <input type="password" name = "pass2">
        <span data-placeholder="Confirm Password"></span>
      </div>

      
     

    

      <div class = "txtb">
        <input type="text" id="datepicker" name = "DOB"> 
        <span data-placeholder="Date Of Birth"></span>
      </div>

      
      <hr>
      <br>
      <h4>Address</h4>
      

      <div class="txtb">
        <input type="text" name="address1">
        <span data-placeholder="Address 1"></span>
      </div>

      <div class="txtb">
        <input type="text" name="address2">
        <span data-placeholder="Address 2"></span>
      </div>

      <div class="txtb">
        <input type="text" name="city">
        <span data-placeholder="City"></span>
      </div>

      <div class="txtb">
        <input type="text" name="county">
        <span data-placeholder="County"></span>
      </div>


      <div class="txtb">
        <input type="text" name="postcode">
        <span data-placeholder="Post Code"></span>
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