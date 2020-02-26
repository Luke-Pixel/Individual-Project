



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="home.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <aside>
      <figure>
          <div id="avatar"></div>
          <figcaption>Johnny Doe</figcaption>
      </figure>
      <img src="images/menu.svg" class = "Menu_Bar">
      <nav>
          <ul>
              <li><a href="home.html">Home</a></li>
              <li><a href="viewscreenings.html">View STI Screenings</a></li>
              <li><a href="viewhpv.html">View HPV Vacination</a></li>
              <li><a href="viewhep.html">View HEP A&B Vaciniation</a></li>
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
      
        <main>
        
        <form class = "home_1" >
          <main>
              <h2>Screening History</h2>
              <p>Add ypur STI screening results for a full history of all your STI screens</p>
              <?php
                $chl = 'NA';
                $gon = 'NA';
                $syph = 'NA';
                $hiv = 'NA';
                $sql = 'SELECT * from screening Where latest = true';
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0){
                  //test found 
                  
                }
              ?>
              <h3>Last Test</h3>
            <h4>Chlamydia:<?php echo $row['Chlamydia'];?></h4>
            <h4>Gonnorea: <?php echo $row['Gonnorea '];?> </h4>
            <h4>Syphilis: <?php echo $row['Syphilis'];?> </h4>
            <h4>HIV: <?php echo $row['HIV'];?></h4>
              <a href="https://www.shl.uk" target="_blank" class="cta">Add STI Screening results</a>
              <a href="https://www.shl.uk" target="_blank" class="cta">View More History</a>
          </main>
      </form>

        <form class = "home_1" style="float:left;">
        <main>

           <h2>Test at Home</h2>
            <img src = "images/SHL.png" class = "SHL_Logo">
            <p>Sexual Health London (SHL) is London’s new sexual health e-service that provides free and easy access to sexual health testing via the internet and local venues.
                    </p>

            <a href="https://www.shl.uk" target="_blank" class="cta">Order Test Kit</a>
        </main>
    </form>

    <form class = "form2" >
            <main>
    
                <h2>Find a Clinic</h2>
                <img src = "images/sxt.png" class = "SHL_Logo">
                <p> 
                  Find clinics to get tested for genital warts, herpes, gonorrhoea, syphilis, trichomoniasis (TV), pubic lice (crabs), scabies and others
                  </p>
    
                <a href="https://sxt.org.uk/service" target="_blank" class="cta">Find clinics for this service</a>
            </main>
        </form>
        
        <form class = "home_1">
        <?php
                $dose1 = 'NA';
                $dose2 = 'NA';
                $dose3 = 'NA';
                $sql = 'SELECT * from HPV ';
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0){
                  //test found 
                  
                }
              ?>
          <main>
          <h1>HPV Status</h1>
            <br>
            <h4>Dose 1: <?php echo $row['Chlamydia'];?> </h4> 
            <br>
            <h4>Dose 2: <?php echo $row['Chlamydia'];?> </h4>
            <br>
            <h4>Dose 3: <?php echo $row['Chlamydia'];?> </h4>
            <br>
            <hr>
            <br>
            <h4>Next Dose: </h4>
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
         
    
          </main>
        </form>4

        <form class = "home_1">
          <main>
          <?php
                $dose1 = 'NA';
                $dose2 = 'NA';
                $dose3 = 'NA';
                $sql = 'SELECT * from HPV ';
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0){
                  //test found 
                  
                }
              ?>
          <h1>Hep A&B Status</h1>
            <br>  
            <h4>Dose 1: <?php echo $row['Chlamydia'];?> </h4>         
            <br>
            <h4>Dose 2: <?php echo $row['Chlamydia'];?> </h4>
            <br>
            <h4>Dose 3: <?php echo $row['Chlamydia'];?> </h4>
            <br>
            <hr>
            <br>
            <h4>Next Dose: <?php echo $row['Chlamydia'];?> </h4>
            <br>
            <hr>
            <br>
            <input  type="button" id="button" class="logbtn" value="Edit" onclick="openModal()">
          <br>
          
         
    
         
          </main>
        </form>

        <form class = "home_1">
          <main>
          <h1>Smokefree</h1>
          <p>Free, proven support to help you quit! Join the 
            millions of people who have used Smokefree support to help them stop smoking. 
            From email and text, to our free app and lots of other support, 
            you can choose what's right for you.</p>
          </main>
        </form>

        <form class = "home_1">
          <main>
          <h1>FRANK</h1>
          <img src = "images/frank.svg" class = "SHL_Logo">
          <p>Find out everything you need to know about drugs, their effects and the law. Talk to Frank for facts, 
            support and advice on drugs and alcohol today.</p>
          </main>
        </form>

        <form class = "home_1">
          <main>
          <h1>Support for people living with HIV</h1>
    
        </main>
        </form>

        <form class = "home_1">
          <main>
          <h1>NHS Eat Well</h1>

          <p><strong> A healthy, balanced diet is an important part of maintaining good health, and can help you feel your best.</p></strong>
          <p>This means eating a wide variety of foods in the right proportions, and consuming the right amount 
            of food and drink to achieve and maintain a healthy body weight.</p>
            <p><a href="#">This page</a>  covers healthy eating advice for the general population.</p>

          </main>
        </form>

    
        <div class="bg-modal">
            <div class = modal-content>
                <div class="close" onclick="closeModal()">+</div>
                <script>
                    function closeModal() {
                     document.querySelector('.bg-modal').style.display = 'none';
                    }
                    </script>
                <form>
                    <h4>Dose 1: </h4>
                    <div class = "txtb">
                        <input type="text" id="datepicker">
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
    
                     <input href='#' type="submit" id="button" class="logbtn" value="Edit" onclick="openModal()">
                </form>
            </div>
        </div>
        </main>
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
        <footer>
          <br>
          <br>
          <br>
        </footer>
</html>
