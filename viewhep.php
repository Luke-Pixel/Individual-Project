<?php
session_start();

$dose1t = "12-09-2019";
$idtest = 1;
$servername = "localhost";
$dBUseraneme = "root";
$dbPassword = "";
$dBName ="projectdb2";

$conn = mysqli_connect($servername, $dBUseraneme, $dbPassword, $dBName);

if(!$conn){
    header("Location: ../index.html?error=mysqlerror_connection");
    die("connection failed ".mysqli_connect_error());

}

$sql = 'SELECT * FROM `hpv` WHERE `patient_ID` = ? ';
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
  header("Location: ../sighnup.php?error=passwordcheck&email=" .$email);
  exit();
}else{
  mysqli_stmt_bind_param($stmt,'i',$idtest);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  if($row = mysqli_fetch_assoc($result)){
    $dose1 = $row['dose1'];
    $dose2 = $row['dose2'];
    $dose3 = $row['dose3'];
    $next_dose = $row['next_dose']; 
  }else{
    $dose1 = 'NA';
    $dose2 = 'NA';
    $dose3 = 'NA';
    $next_dose = 'NA'; 
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="viewhep.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
        $( "#datepicker" ).datepicker({
          dateFormat: 'yy-mm-dd', 
          changeMonth: true,
          changeYear: true
          });
        } );
    </script>
    <script>
        $( function() {
        $( "#datepicker2" ).datepicker();
        } );
    </script>
    <script>
        $( function() {
        $( "#datepicker3" ).datepicker();
        } );
    </script>
    
    <aside>
      <figure>
          <div id="avatar"></div>
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
              <li><a href="#">Logout</a></li>
          </ul>
      </nav>
  </aside>
    </head>
<body>

   

    <form class="form1">
      <h1>Hep A Status</h1>

      
        <br>

        <h4>Dose 1: </h4>
        
        <br>
        <h4>Dose 2: </h4>
        <br>
        <h4>Dose 3: </h4>
        <br>
        <hr>
        <br>
        <h4>Next Dose: </h4>
        <br>
        <hr>

        <br>
        <input  type="button" id="button" class="logbtn" value="Edit" onclick="openModal()">
      <br>
      
     

      <h1>Hep B Status</h1>

      
        <br>

        <h4>Dose 1: </h4>
        <br>
        <h4>Dose 2: </h4>
        <br>
        <h4>Dose 3: </h4>
        <br>
        <hr>
        <br>
        <h4>Next Dose: <?php echo $nextdose; ?></h4>
        <br>
        <hr>
        <br>
        <input type="button"  id="button" class="logbtn" value="Edit" onclick="openModal()">
        
    </form>

    <div class="bg-modal">
        <div class = modal-content>
            <div class="close" onclick="closeModal()">+</div>
            
            <form action="includes/addHEP.php" method = "post">
                <h4>Dose 1: </h4>
                <div class = "txtb">
                    <input type="text" id="datepicker" name = "date1">
                    <span data-placeholder="Date Of Birth"></span>
                  </div>
                <br>
                <h4>Dose 2: </h4>
                <div class = "txtb">
                    <input type="text" id="datepicker2">
                    <span data-placeholder="Date Of Birth"></span>
                  </div>
                <br>
                <h4>Dose 3: </h4>
                <div class = "txtb">
                    <input type="text" id="datepicker3">
                    <span data-placeholder="Date Of Birth"></span>
                  </div>
                <br>

                 <input href='#' type="submit" id="button" class="logbtn" value="Submit" >
                 <script>
                    function openModal() {
                     document.querySelector('.bg-modal').style.display = 'flex';
                    }
                </script>
                <script>
                    function closeModal() {
                     document.querySelector('.bg-modal').style.display = 'none';
                    }
                </script>
            </form>
        </div>
    </div>
    
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