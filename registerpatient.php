<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="sighnup.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
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
        <input type="text" name="name1">
        <span data-placeholder="First Name"></span>
      </div>

      <div class="txtb">
        <input type="password" name="name2">
        <span data-placeholder="Second Name"></span>
      </div>

      <div class="txtb">
        <input type="password" name = "DOB">
        <span data-placeholder="CDOB"></span>
      </div>

      <div class = txtb>
            <p name = "date_pick">Date of test: <input type="text" id="datepicker"></p>
            </div>

      <div class="txtb">
        <input type="password" name="name2">
        <span data-placeholder="Second Name"></span>
      </div>

      <div class="txtb">
        <input type="text" name="housenum">
        <span data-placeholder="Address Number"></span>
      </div>

      <div class="txtb">
        <input type="text" name="street">
        <span data-placeholder="Street"></span>
      </div>

      <div class="txtb">
        <input type="text" name="city">
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