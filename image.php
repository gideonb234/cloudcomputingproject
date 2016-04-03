<!doctype html>
<html class="no-js" lang="en">
<?php
  include_once('backend/images.php');
  session_start();
  if(isset($_POST['comment'])) {
    $comment = new ImageHandler();
    $comment->createComment($_POST['comment_text'],$_GET['image_id'],$_SESSION['user_id']);
    echo "success";
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
        <?
        if(isset($_SESSION['user_id'])){
        echo' <p><a href="loggedIn.php" class="small button">Upload</a><br/></p>       
        <p><a href="allimages.php" class="small button">Gallery</a><br/></p>
        <p><a href="viewImages.php" class="small button">View Images</a><br/></p>
        <p><a href="logout.php" class="small button">Logout</a><br/></p>';
      } else {
        echo'<p><a href="#regform_form" class="small button">Register</a><br/>
        <p><a href="#login_form" class="small button">Login</a><br/>';
      }
      ?>
   		<a href="index.php" style="text-decoration:none; color:inherit;"><h2> Image Uploader <h2></a>
      </div>
    </div>
    <div class="row">
      <div class="large-12 columns">
        <div class="callout large">     
           <div id="singleimagebox">
           <!-- image crap goes here, i'll do a get thing or whatever -->
        <?php
        if (isset($_GET['image_id'])){
          $image_id = $_GET['image_id'];
          $imgcon = new ImageHandler();
          $img = $imgcon->getImage($image_id);
          $string = 'https://storage.googleapis.com/cloud-computing-storage/'.$img[image_filepath];
          echo'<img src="'.$string.'"class="imageSingleResize">';
        }
        ?>
           </div>
        </div>
      </div>
      
      
      <div class="large-12 columns">
        <div class="callout large">     
           <div id="commentbox">      
			<table>
	<thead>
		<tr>
			<th><h1>Leave a comment!</h1></th>
			
				</tr>
			</thead>
				<tbody>
				<?php
        if(isset($_GET['image_id'])){
          $iid = $_GET['image_id'];
          $comment = new ImageHandler();
          $listOfComments = $comment->listComments($iid);
          foreach ($listOfComments as $com) {
            echo "<tr>
            <td><h3>".$com[comment_text]."</h3></td>
          </tr>";
          }
        }
        ?>
				</tbody>
			</table>
      <?php
        if (isset($_SESSION['user_id'])) {
        echo '<form action="#" method="post">
			<div>
		<textarea class="txtarea" name="comment_text" id="bgCol" onfocus="setBackgroundColour("#e5fff3");this.value='.';" onblur="setBackgroundColour("white")>Leave your comment here...</textarea>
			</div>
			<input class="small button" name="comment" type="submit" value="Submit">
			</form>';
      } else {
        echo '<h2>You must be logged in to leave comments</h2>';
      }
      ?>
           </div>
        </div>
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
<script>
function setBackgroundColour(color)
{
	document.getElementById("bgCol").style.background=color
}
</script>