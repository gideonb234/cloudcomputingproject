<!doctype html>
<html class="no-js" lang="en">
<?php
  session_start();
  if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
  }
?>
  <head>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

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
       
		<p><a href="loggedIn.php" class="small button">Upload</a><br/></p>       
        <p><a href="allimages.php" class="small button">Gallery</a><br/></p>
        <p><a href="viewImages.php" class="small button">View Images</a><br/></p>
        <p><a href="logout.php" class="small button">Logout</a><br/></p>
   		<a href="index.php" style="text-decoration:none; color:inherit;"><h2> Image Uploader <h2></a>
      </div>
    </div>

    <div class="row">
      <div class="large-12 columns">
        <div class="callout large">     
           <div id="dropbox">
           <div class="browse">
           <!-- uhh hope this works <3 -->
   			 
             <span class="message"><h2 id="subtitle" >Click to Upload an Image</h2></span>
             
           
             <!-- uhh hope this works <3 -->
           <form id="imageForm" method="post" action="backend/upload.php" enctype="multipart/form-data">
   			 <input type="file" name="user_image" id="image" class="input_text" onchange="readURL(this);"/>
 		   </form>
           		</div>
                <img style="width:720px; height:auto;" class="imageSingleResize" id="imagePort" style="visibility: hidden;" src="#"/>
           
			</div>
          </div>
          
        </div>
      </div>
    </div>
    <div class="row">
       <p><button class="small button" type="submit" name="image" form="imageForm">Upload</button></br>
       
        </div>
    </div>
  </body>
  
  <script>
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            document.getElementById('imagePort').style.visibility = "visible";
            reader.onload = function (e) {
                $('#imagePort')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
					document.getElementById('subtitle').innerHTML= '';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
  </script>
  
  
  
  
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
      <button class="small button" type="submit" name="login_form"/>Log In</button>
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
      <button class="small button" type="submit" name="register_form"/>Register</button>
    </form>
    <a class="close" href="#close"></a>
  </div>
  
</html>
