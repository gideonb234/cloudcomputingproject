<?php
/** 
 * Handle communication between db and filestore for images
 * Also possible handle the link generation????
 * Handle comments for each image as well (just create and list is needed)
 */

include_once '../error-enable.php';
include_once 'config-sql.php';

class ImageHandler{
    public function uploadImage($id, $file) {
        //Gideon check
        require_once 'config-storage.php';
        $storagecontroller = new CloudStorage();
        $result_url = $storagecontroller->storeFile($file);



        $db = new CloudSql();
        $query = "INSERT INTO Image(`image_filepath`, `image_user_fk`) VALUES('$result_url', '$id')";
        if($db->create($query, $mediaLink)){
            //return last insert id
            return mysqli_insert_id($conn);
        }   else {
            return False;
        }
}

    public function generateLink() {

    }

    public function saveToDb() {
        $db = new CloudSql();
        $query = "INSERT INTO Image() VALUES() &&";
        $db->create($query, $mediaLink);
    }

    public function getImage($id)
    {
        $pdo = CloudSql->$this->newConnection();
        $statement = $pdo->prepare('SELECT * FROM Image WHERE image_id = :id');
        $statement->bindValue('id', $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // todo: fix this

    public function listImages($listLimit = 10, $cursor = null)
    {
        $pdo = CloudSql->$this->newConnection();
        if ($cursor) {
            $query = 'SELECT * FROM Image WHERE image_id > :cursor ORDER BY image_id' .
                ' LIMIT :limit';
            $statement = $pdo->prepare($query);
            $statement->bindValue(':cursor', $cursor, PDO::PARAM_INT);
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