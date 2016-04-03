<?php
include_once('../error-enable.php');
include_once('images.php');
session_start();
$id = $_SESSION['user_id'];
if (isset($_POST["image"])) {
	if (!empty($_FILES['user_image'])){
	    $fileType = $_FILES["user_image"]["type"]; 
	    if (($fileType == "image/gif") || ($fileType == "image/jpeg") ||
    	($fileType == "image/jpg") || ($fileType == "image/png")) {
    		//Replaces spaces in the name of the file with _ 
    		$file = preg_replace('/\s+/', '_', basename( $_FILES['user_image']['name']));
    		$savedirectory = "../upload/".$file;
    		move_uploaded_file($_FILES["user_image"]["tmp_name"], $savedirectory);
    		$imagecontroller = new ImageHandler;
    		$result = $imagecontroller->UploadImage($file, $id); 
            echo $result;
    		// if($result != False){
      //           echo "success";
    		// 	unlink($savedirectory); 
    		// 	//$_GET['image_id']
    		// 	// header('Location: image.php?image_id=$result' );
    		// 	//image.php is whatever the image page is
    		// } else {
    		// 	unlink($savedirectory); 
    		// 	echo "Failed to upload to Google.";
    		// }
    	} else {
    		echo "File is not in correct image format. Kill yourself in a formal manner.";
    	}

	}
	 
}
?>