<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="viewscreenings.css">
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

        <form action="includes/interview.php" method="post" class="sighnup-form">
            <h1>Results</h1> <br>
            <?php
              require 'dbcon.php';
              $sql = 'SELECT * from HPV ';
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0){
                  //test found 
                  
                }
              
          
            ?>
            <hr>
            <br>
            <h4>TST#1</h4>
            <br>          
             Date: 01/09/2019 <br>
             <h3>Chlamydia: </h3>
             <h5>Gonnorea: </h5>
             <h4>Syphilis: </h4>
             <h4>HIV: 2</h4>
             
              
                      
            <br>
            <br>
            <hr>            
            <button type="submit" name = "next" class="next_btn">View</button><br><br>
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