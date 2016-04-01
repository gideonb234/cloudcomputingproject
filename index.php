<!doctype html>
<html class="no-js" lang="en">
  <?php
    if (isset($_POST['register_form'])) {
      echo "register works";
    }
  ?> 
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Image Upload | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
  </head>
  <body>

    <div class="row">
      <div class="large-12 columns">
        <p><a href="#regform_form" class="small button">Register</a><br/>
        <p><a href="#login_form" class="small button">Login</a><br/>
      	<h2> Image Uploader <h2>
      </div>
    </div>

    <div class="row">
      <div class="large-12 columns">
        <div class="callout large">
          <div id="dropbox">
            <span class="message">Drop images here to upload.</span>
        	</div>
        </div>
      </div>
    </div>

    <script src="http://code.jquery.com/jquery-1.6.3.min.js"></script>
    <script src="assets/js/jquery.filedrop.js"></script>
    <script src="assets/js/script.js"></script>
  </body>

  <!-- popup form #1 -->
  <a href="#x" class="overlay" id="login_form"></a>
  <div class="popup">
    <form name="login_form" action="" method="POST">
      <h2>Welcome Guest!</h2>
      <p>Please enter your username and password here</p>
      <div>
        <label for="username">Login</label>
        <input type="text" id="username" value="" />
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" id="password" value="" />
      </div>
      <input type="submit" value="Log In" />
    </form>
    <a class="close" href="#close"></a>
  </div>

  <!-- popup form #2 -->
  <a href="#x" class="overlay" id="regform_form"></a>
  <div class="popup">
    <form name="register_form" action="backend/login-register.php" method="POST">
      <h2>Welcome!</h2>
      <p>Please enter your username and password and email here</p>
      <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="" />
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="" />
      </div>
      <div>
        <label for="confirm_password">Confirm</label>
        <input type="password" name="confirm_password" id="conifrm_password" value="" />
      </div>
      <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="" />
      </div>
      <input type="submit" name="register_form" value="Register" />
    </form>
    <a class="close" href="#close"></a>
  </div>

<!-- 
  onclick="script()"
  getElementById for all 4 vars
  POST it to php script?
-->

</html>
