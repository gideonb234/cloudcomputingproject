<!doctype html>
<html class="no-js" lang="en">
  <head>
  <?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
      header("Location:index.php");
    }
  ?>
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
        <p><a href="logout.php" class="small button">Logout</a><br/>
   		<a href="index.php" style="text-decoration:none; color:inherit;"</a><h2> Image Uploader <h2>
      </div>
    </div>
    <div class="row">
      <div class="large-12 columns">
        <div class="callout large">     
           <div id="imagebox">
       
       <!-- if all images arent populated, leave blank.gif so there is no fucking border....... like below.--> 
       
  		<div class="floated_img" style="height:10px; width:10px;">
   			<a href="link"> <img class="resize" src="assets/img/blank.gif" alt="">
		</div> 
       <?php
        require_once('backend/images.php');
        $images = new ImageHandler();
        $listOfImages = $images->listImages($_SESSION['user_id']);
        print_r($listOfImages);
       ?> 
                 <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div><div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                <div class="floated_img" style="height:10px; width:10px;">
   			 		<a href="http://goo.gl/ytbJn8"><img class="resize" src="http://goo.gl/ytbJn8" alt="img">
				</div>
                        
          </div>
          
        </div>
      </div>
    </div>
 

  </body>

</html>
