<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="newscreening.css">
    <link rel="stylesheet" href="main.css">
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

        <form action="includes/addScrrening.php" method="post" class="screening-form">
            <h1>Add new STI Results</h1> <br>
            <hr>
            <br>
            
            <h4>Chlamydia</h4> <br>
            
            <label class = "container">Positive 
                <input type="radio" 
                name="Chlamydia" 
                value="chlamydia_yes" > 
                <span class = "checkmark"></span>
            </label>
            <br>
            <label class = "container">Negative
                <input type="radio" 
                name="Chlamydia" 
                value="chlamydia_no" > 
                <span class = "checkmark"></span><br> 
            </label>
            <br>
            <label class = "container">Not Applicable 
                <input type="radio" 
                name="Chlamydia" 
                value="chlamydia_na" > 
                <span class = "checkmark"></span><br> 
            </label>
            <br>
            <hr>
            <br>
            <h4>Gonorrhea</h4> <br>
            
            <label class = "container">Positive 
                <input type="radio" 
                name="Gonorrhea" 
                value="gonorrhea_yes" > 
                <span class = "checkmark"></span>
            </label>
            <br>
            <label class = "container">Negative
                <input type="radio" 
                name="Gonorrhea" 
                value="gonorrhea_no" > 
                <span class = "checkmark"></span>
            </label>
            <br>
            <label class = "container">Not Applicable 
                <input type="radio" 
                name="Gonorrhea" 
                value="gonorrhea_na" > 
                <span class = "checkmark"></span>
            </label>
        
            <br> 
            <hr>
            <br>
            <h4>Syphilis</h4> 
            <br>
            
            <label class = "container">Positive 
                <input type="radio" 
                name="Syphilis" 
                value="syphilis_yes" > 
                <span class = "checkmark"></span>
            </label>
            <br>
            <label class = "container">Negative
                <input type="radio" 
                name="Syphilis" 
                value="syphilis_no" > 
                <span class = "checkmark"></span>
            </label>
            <br>
            <label class = "container">Not Applicable 
                <input type="radio" 
                name="Syphilis" 
                value="syphilis_na" > 
                <span class = "checkmark"></span>
            </label>
            <br> 
            <hr>
            <br>
            <h4>HIV</h4> <br>
            
            <label class = "container">Positive 
                <input type="radio" 
                name="HIV" 
                value="hiv_yes" > 
                <span class = "checkmark"></span>
                
            </label>
            <br>
            <label class = "container">Negative
                <input type="radio" 
                name="HIV" 
                value="hiv_no" > 
                <span class = "checkmark"></span>
            </label>
            <br>
            <label class = "container">Not Applicable 
                <input type="radio" 
                name="HIV" 
                value="hiv_na" > 
                <span class = "checkmark"></span><br> 
            </label>


            <div class = txtb>
            <p name = "date_pick">Date of test: <input type="text" id="datepicker" name = "date"></p>
            </div>
            
            <button type="submit" name = "submit_screening" class="logbtn">Submit</button><br><br>
           
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