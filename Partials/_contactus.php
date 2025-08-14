<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
  <!-- <link rel="stylesheet" href="../assets/css/ContactUS_Style.css" type="text/css"> -->
  <link rel="stylesheet" href="..\assets\css\ContactusStyle.css" type="text/css">
  
  <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
</script>
<script type="text/javascript">
   (function(){
      emailjs.init("kXHebRu2keaKB_Zm3");
   })();
</script>

    <style>
     
      </style>
    <!-- Icon script-->
    <script src="https://kit.fontawesome.com/a7a17df157.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
      <span class="big-circle"></span>
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
            If you have any problem contact below for any information
          </p>

          <div class="info">
            <div class="information">
            <div class="icon"><i class="fa-regular fa-map-location-dot"></i></div>
              <p>Unjha-384170,Mehsana</p>
            </div>
            <div class="information">
            <div class="icon"><i class="fa-regular fa-envelope"></i></div>
              <p>growmore655@gmail.com</p>
            </div>
            <div class="information">
            <div class="icon"><i class="fa-regular fa-phone-volume"></i></div>
              <p>99133-62680</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="https://www.facebook.com/profile.php?id=100091882283033&mibextid=ZbWKwL">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://twitter.com/GrowMor22127653?t=kjjIt7vmQqDZpxrNpTbYIQ&s=08">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="https://instagram.com/growmore_c_f_m?igshid=YmMyMTA2M2Y=">
                <i class="fab fa-instagram"></i>
              </a>
              <!--<a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>-->
            </div>
          </div>
          <a href="../Index.php"> <button type="button" style="width:100%; background-color:#007bff; margin-top:20px; color:white;" class="btn">BACK</button></a>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="#" autocomplete="off">
            <h3 class="title">Contact us</h3>
            <div class="input-container">
              <input type="text" name="name" id="name" class="input" />
              <label for="">Username</label>
              <span>Username</span>
            </div>
            <div class="input-container">
              <input type="text" name="email" id="email" class="input" />
              <label for="">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container">
              <input type="tel" name="phone" id="phone" class="input" />
              <label for="">Phone</label>
              <span>Phone</span>
            </div>
            <div class="input-container textarea">
              <textarea name="message" id="message" class="input"></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <div class="button-area">
            <input type="submit" name="submit" value="Send" class="btn" onclick="sendMail()">
          <span>Sending Message...</span>
          </div>
        </form>
        </div>
      </div>
    </div>
   <!------------------------------------------------ Main Body End here ------------------------------------------------->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
   
    <script src="..\assets\JS\contactus.js"></script>
    
  </body>
</html>
