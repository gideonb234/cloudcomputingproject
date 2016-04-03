<?php
/** 
 * Handle communication between db and filestore for images
 * Also possible handle the link generation????
 * Handle comments for each image as well (just create and list is needed)
 */

include_once '../error-enable.php';
include_once 'config-sql.php';
include_once 'config-storage.php';

class ImageHandler{
    public function uploadImage($file, $id) {
        $storagecontroller = new CloudStorage();
        $result_url = $storagecontroller->storeFile($file);
        $db = new CloudSql();
        $conn = $db->connection();
        $encoded_url = $conn->quote($result_url);
        echo $result_url; echo '\n'; echo $id;
        try {
            $stmt = $conn->prepare("INSERT INTO Image(`image_filepath`, `image_user_fk`) VALUES(:image_path, :uid)");
            $stmt->bindParam(':image_path', $result_url, PDO::PARAM_STR);
            $stmt->bindParam(':uid', $_SESSION['user_id'], PDO::PARAM_INT);
            $stmt->execute();
            $db = null;
            return $conn->lastInsertId();
        } catch (PDOException $e) {
            var_dump($e);
            die();
        }
    }

    public function generateLink() {

    }

    public function saveToDb() {
        $db = new CloudSql();
        $query = "INSERT INTO Image() VALUES() &&";
        $db->create($query, $mediaLink);
    }

    public function getImage($url)
    {
        try {
            $db = new CloudSql();
            $conn = $db->newConnection();
            $statement = $conn->prepare('SELECT * FROM Image WHERE image_filepath = :image_path');
            $statement->bindValue(':image_path', $url);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage() + '\\n';
        }
    }

    // todo: fix this

    public function listImages($listLimit = 10, $cursor = null)
    {
        $db = new CloudSql();
        $pdo = $db->newConnection();
        if ($cursor) {
            $query = 'SELECT * FROM Image WHERE image_id > :cursor ORDER BY image_id' .
                ' LIMIT :limit';
            $statement = $pdo->prepare($query);
            $statement->bindValue(':cursor', $cursor, PDO::PARAM_INT);
            $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
        } else {
            $query = 'SELECT * FROM image ORDER BY image_id LIMIT :limit';
            $statement = $pdo->prepare($query);
        }
        $statement->bindValue(':limit', $listLimit + 1, PDO::PARAM_INT);
        $statement->execute();
        $rows = array();
        $last_row = null;
        $new_cursor = null;
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            if (count($rows) == $limit) {
                $new_cursor = $last_row['id'];
                break;
            }
            array_push($rows, $row);
            $last_row = $row;
        }
        return array(
            'Image' => $rows,
            'cursor' => $new_cursor,
        );
    }

    public function createComment($comment, $image_id, $user_id) {
        // get session id for user_id, use a POST for image_id and comment is just text
    }

    public function listComments($image) {
        // list all comments based on the image_foreign_key in the comment row
    }

}
?>