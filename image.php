<!doctype html>
<html class="no-js" lang="en">
<?php
  session_start();
  if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
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
       
        <p><a href="viewImages.php" class="small button">View Images</a><br/>
        <p><a href="index.php" class="small button">Logout</a><br/>
   		<h2> Image Uploader <h2>
      </div>
    </div>
    <div class="row">
      <div class="large-12 columns">
        <div class="callout large">     
           <div id="singleimagebox">
			<img src="http://goo.gl/ytbJn8" 
				style="width: auto; height: auto;max-width: 720px;max-height: auto">
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
				<tr>
					<td><h3>ssss</h3></td>
				</tr>   
					<tr>
						<td><h3>ssss</h3></td>
					</tr>
					<tr>
						<td><h3>ssss</h3></td>
					</tr>
				</tbody>
			</table>
            <form action="/html/tags/html_form_tag_action.cfm" method="post">
			<div>
			<textarea class="txtarea" name="comments" id="comments" 
            style="font-family:sans-serif;font-size:1.2em;height:50px;"> </textarea>
			</div>
			<input type="submit" value="Submit">
			</form>          
           </div>
        </div>
      </div>    
    </div>
  </body>
</html>
