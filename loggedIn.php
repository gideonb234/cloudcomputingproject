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
             <form enc-type="multipart/form-data">
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
     <h2>Welcome Guest!</h2>
     <p>Please enter your login and password here</p>
   <div>
   <label for="login">Login</label>
   <input type="text" id="login" value="" />
   </div>
   <div>
   <label for="password">Password</label>
   <input type="password" id="password" value="" />
   </div>
   <input type="button" value="Log In" />
   <a class="close" href="#close"></a>
</div>

 <!-- popup form #2 -->
<a href="#x" class="overlay" id="regform_form"></a>
   <div class="popup">
     <h2>Welcome Guest!</h2>
     <p>Please enter your login and password here</p>
   <div>
   <label for="username">Username</label>
   <input type="text" id="username" value="" />
   </div>
   <div>
   <label for="password">Password</label>
   <input type="password" id="password" value="" />
   </div>
   <div>
   <label for="password">Password</label>
   <input type="password" id="password" value="" />
   </div>
   <div>
   <label for="email">Email</label>
   <input type="email" id="email" value="" />
   </div>
   <input type="button" value="Register" />
   <a class="close" href="#close"></a>
</div>
  
</html>
