<?php
session_start();
//database connection
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
// select all vaccination records fro hep
$sql = 'SELECT * FROM `hep` WHERE `patient_ID` = ? ';
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
  header("Location: ../sighnup.php?error=passwordcheck&email=" .$email);
  exit();
}else{
  mysqli_stmt_bind_param($stmt,'s',$_SESSION['ID']);
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
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="viewhpv.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
        $( "#datepicker" ).datepicker({
          dateFormat: 'yy-mm-dd',
          changeMonth:true,
          changeYear: true
        });
        } );
    </script>
    
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

    

    <form class="form1">
      <h1>Hepatitus A and B Imunisation</h1>
      <br>
      <p> Twinrix is used to help 
        prevent infection from the hepatitis A and B viruses. 
        Hepatitis A infection can be mild with no symptoms or a severe 
        illness that can rarely cause liver failure and death. Hepatitis B 
        infection can cause serious problems including liver failure, persistent 
        hepatitis B infection, cirrhosis, and liver cancer. Preventing infection with 
        these viruses can prevent these problems.</p>
        <br>
        <p>The vaccine's available from sexual health and HIV clinics.</p>
        <br>
        <!-- display users vaccine records -->
        <h4>Dose 1: <?php echo $dose1 ?> </h4> 
        <br>
        <h4>Dose 2: <?php echo $dose2 ?> </h4>
        <br>
        <h4>Dose 3: <?php echo $dose3 ?> </h4>
        <br>
        <hr>
        <br>
        <h4>Next Dose: <?php echo $next_dose ?> </h4>
        <br>
        <hr>

        <br>
        <input  type="button" id="button" class="logbtn" value="Edit" onclick="openModal()">
      <br>
      <script>
        function openModal() {
         document.querySelector('.bg-modal').style.display = 'flex';
         
         
        }
        </script>
     

      
    </form>
        <!-- modal menu displayed when user updates records-->
    <div class="bg-modal">
        <div class = modal-content>
            <div class="close" onclick="closeModal()">+</div>
            <script>
                function closeModal() {
                 document.querySelector('.bg-modal').style.display = 'none';
                }
                </script>
            <form action="includes/addHEP.php" method = "post">
                <h4>Date Recieved </h4>
                <div class = "txtb">
                    <input type="text" name = 'date1' id="datepicker" autocomplete = "off">
                    <span data-placeholder="Date Of Birth"></span>
                  </div>
               
                <br>
                
                 <input  name = 'hep-submit' type="submit" id="button" class="logbtn" value="Update" onclick="openModal()">
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

</body>
</html>