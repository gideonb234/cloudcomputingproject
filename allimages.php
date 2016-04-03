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
          <div id="imagebox">
       <h2 style="text-align:centre">Sign in to start uploading!</h2>
       
       <?php
        require_once('backend/images.php');
        $images = new ImageHandler();
        $listOfImages = $images->listImagesIndex();
        $count = 20;
        foreach($listOfImages as $image){
          $string = 'https://storage.googleapis.com/cloud-computing-storage/'.$image[image_filepath];
          echo '
          <div class="floated_img" style="height:10px; width:10px;">
            <a href="image.php?image_id=' . $image[image_id].'"><img class="resize" src="'.$string.'" alt="img">
        </div>';
          $count--;
        } 
        for ($i=0; $i < $count; $i++) { 
          echo '<div class="floated_img" style="height:10px; width:10px;">
        </div>';
        }
       ?>               
          </div>
          </div>
          
        </div>
      </div> 
    <div class="row">
      
      <!-- upload button, use to upshit up  -->
      <!-- <p><a href="#up?" class="button">Upload</a><br/> --> 
       
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
