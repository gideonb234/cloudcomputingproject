<?php
include_once('images.php');
//Check session gideon can do this because I'm not sure what his parameters are or you can just you know gideon check session word for word? I like monkey balno. Val likes monkey balls. Gideon check the session.
$id = $_SESSION['userid'];

if (isset($_POST["submit"])) {

	if (!empty($_FILES['uimage'])){
	    
	    $fileType = $_FILES["uimage"]["type"]; 
	    if (($fileType == "image/gif") || ($fileType == "image/jpeg") ||
    	($fileType == "image/jpg") || ($fileType == "image/png")) {
    		//Replaces spaces in the name of the file with _ 
    		$file = preg_replace('/\s+/', '_', basename( $_FILES['uimage']['name']));
    		$savedirectory = "upload/".$file;
    		move_uploaded_file($_FILES["uimage"]["tmp_name"], $savedirectory);
    		$imagecontroller = new ImageHandler;
    		$result = $imagecontroller->UploadImage($id, $file); 
    		if($result != False){
    			unlink($savedirectory); 
    			//$_GET['image_id']
    			header('Location: image.php?image_id=$result' );
    			//image.php is whatever the image page is
    		} else {
    			unlink($savedirectory); 
    			echo "Failed to upload to Google.";
    		}
    	} else {
    		echo "File is not in correct image format. KILL YOURSELF. nicely.";
    	}

	}
	 
}
?>