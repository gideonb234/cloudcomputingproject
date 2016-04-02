<!doctype html>
<html class="no-js" lang="en">
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
       
        <p><a href="viewImages.php" class="small button">View Images</a><br/>
        <p><a href="index.php" class="small button">Logout</a><br/>
   		<h2> Image Uploader <h2>
      </div>
    </div>

    <div class="row">
      <div class="large-12 columns">
        <div class="callout large">     
           <div id="dropbox">
			<span class="message">
           <div class="browse">
           <!-- uhh hope this works <3 -->
   			 <h2>Click to Browse Images</h2>
             <form method="post" enc-type="multipart/form-data">
   			 <input type="file" name="image" id="image" class="input_text"/>
			</div>
            </span>
				</div>
          </div>
          
        </div>
      </div>
    </div>
    <div class="row">
      <div class="large-12 columns">
      <!-- upload button, use to upshit up  -->
        <p><a href="#up?" class="small button">Upload</a><br/>
        </div>
    </div>

  </body>
  
  <!-- popup form #1 -->
  <a href="#x" class="overlay" id="login_form"></a>
  <div class="popup">
    <form name="login_form" action="backend/login-register.php" method="POST">
      <h2>Welcome Guest!</h2>
      <p>Please enter your username and password here</p>
      <div>
        <label for="username">Login</label>
        <input type="text" name="username" id="username" value="" />
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="" />
      </div>
      <input type="submit" name="login_form" value="Log In" />
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
  
</html>
