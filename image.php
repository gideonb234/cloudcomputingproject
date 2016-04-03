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
       
        <p><a href="viewImages.php" class="small button">View Images</a><br/></p>
        <p><a href="logout.php" class="small button">Logout</a><br/></p>
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
		<textarea class="txtarea" name="comment_text" id="bgCol" onfocus="setBackgroundColour("#e5fff3");this.value='';" onblur="setBackgroundColour("white")>Leave your comment here...</textarea>
			</div>
			<input class="small button" name="comment" type="submit" value="Submit">
			</form>';
      } else {
        echo '<h2>You must be logged in to leave comments</h2>';
      }
           </div>
        </div>
      </div>    
    </div>
  </body>
</html>
<script>
function setBackgroundColour(color)
{
	document.getElementById("bgCol").style.background=color
}
</script>