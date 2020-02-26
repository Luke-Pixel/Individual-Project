<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="interview.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
  </head>
<body>

    <form action="includes/interview.php" method="post" class="sighnup-form">
        <h1>Tell us about yourself </h1> <br>
        <h4>Mental Health</h4>  <br>
        
        <label class = "container">Have you been diagnosed with a mental health condition, eg Depression & Anxiety
          <input type="checkbox" 
          name="mental_helath_yes" 
          value="mental_helath_yes" > 
          <span class = "checkmark"></span><br> <br>
      </label>

      <label class = "container">Are you out to family & Friends
          <input type="checkbox" 
          name="out_yes" 
          value="out_yes" > 
          <span class = "checkmark"></span><br> <br>
      </label>

        
        
        <h4>Alcohol & Drugs</h4> <br>
        
        <label class = "container">I have felt I should cut down on my drinking
            <input type="checkbox" 
            name="cutdrink_yes" 
            value="cutdrink_yes" > 
            <span class = "checkmark"></span><br> <br>
        </label>

        <label class = "container">I have been annoyed by people criticising my drinking
            <input type="checkbox" 
            name="annoying_yes" 
            value="annoying_yes" > 
            <span class = "checkmark"></span><br> <br>
        </label>

        <label class = "container">I have felt bad or guilty about my drinking
            <input type="checkbox" 
            name="feltbad_yes" 
            value="feltbad_yes" > 
            <span class = "checkmark"></span><br> <br>
        </label>

        <label class = "container">I have had a drink first thing in the morning to get rid of a hangover or steady my nerves
            <input type="checkbox" 
            name="drinkmorn_yes" 
            value="drinkmorn_yes" > 
            <span class = "checkmark"></span><br> <br>
        </label>

        <label class = "container">I take club drugs
            <input type="checkbox" 
            name="clubdrug_yes" 
            value="clubdrug_yes" > 
            <span class = "checkmark"></span><br> <br>
        </label>
        
        

        <h4>HIV</h4>

        <h4>Excercise & Health</h4><br>

        <label class = "container">I Excercise regularly
          <input type="checkbox" 
          name="excercise_yes" 
          value="excercise_yes" > 
          <span class = "checkmark"></span><br> <br>
      </label>

      <label class = "container">I am a smoker
          <input type="checkbox" 
          name="smoker_yes" 
          value="smoker_yes" > 
          <span class = "checkmark"></span><br> <br>
      </label>

      <button type="submit" name = "submit_questions" class="next_btn">Next</button>

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