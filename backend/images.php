<?php
/** 
 * Handle communication between db and filestore for images
 * Also possible handle the link generation????
 * Handle comments for each image as well (just create and list is needed)
 */

//include_once '../error-enable.php';
include_once 'config-sql.php';
include_once 'config-storage.php';

class ImageHandler{
    public function uploadImage($file, $id) {
        $storagecontroller = new CloudStorage();
        $result_url = $storagecontroller->storeFile($file);
        $db = new CloudSql();
        $conn = $db->connection();
        $encoded_url = $conn->quote($result_url);
        try {
            $stmt = $conn->prepare("INSERT INTO Image(`image_filepath`, `image_user_fk`) VALUES(:image_name, :uid)");
            $stmt->bindParam(':image_name', $file, PDO::PARAM_STR);
            $stmt->bindParam(':uid', $_SESSION['user_id'], PDO::PARAM_INT);
            $stmt->execute();
            return $conn->lastInsertId();
            $db = null;
        } catch (PDOException $e) {
            var_dump($e);
            die();
        }
    }

    public function getImage($image_id)
    {
        try {
            $db = new CloudSql();
            $conn = $db->connection();
            $statement = $conn->prepare("SELECT * FROM Image WHERE `image_id` = :image_id");
            $statement->bindValue(':image_id', $image_id);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage() + '\\n';
        }
    }

    // todo: fix this

    public function listImages($user_id) {
        try {
            $db = new CloudSql();
            $pdo = $db->connection();
            $statement = $pdo->prepare("SELECT * FROM Image WHERE `image_user_fk` = :user ORDER BY image_id DESC LIMIT 20");
            $statement->bindParam(':user', $user_id, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetchAll();
        } catch (PDOException $e) {
            var_dump($e);
            die();
        }
    }

    public function createComment($comment, $image_id, $user_id) {
        try {
            $db = new CloudSql();
            $conn = $db->connection();
            $statement = $conn->prepare("INSERT INTO Comment (`comment_image_fk`, `comment_user_fk`, `comment_text`) VALUES (:image_id, :user_id, :comment_text");
            $statement->bindParam(':image_id', $image_id);
            $statement->bindParam(':user_id', $user_id);
            $statement->bindParam(':comment_text', $comment);
            $statement->execute();
        } catch (PDOException $e) {
            var_dump($e);
            die(); echo "die";
        }
    }

    public function listComments($image_id) {
        // list all comments based on the image_foreign_key in the comment row
        try {
            $db = new CloudSql();
            $conn = $db->connection();
            $stmt = $conn->prepare("SELECT * FROM Comment WHERE `comment_image_fk` == :image_id");
            $stmt->bindParam(':image_id', $image_id);
            $stmt->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            var_dump($e);
            die();
        }
    }

}
?>