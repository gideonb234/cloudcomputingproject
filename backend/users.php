<?php
// It handles users what more do you want 

include_once '../error-enable.php';

class User {

    public function login($username, $password) {
        // Use bcrypt here (and db connection yes)
        // save the user id to session
        // $_SESSION['user_id'] = $id;
        // $_SESSION['username'] = $username;
        try {
            $query = $this->db->prepare("SELECT * FROM users WHERE user_name=:uname OR user_email=:umail LIMIT 1");
            $query->execute(array(':uname'=>$uname, ':umail'=>$umail));
            $userRow=$query->fetch(PDO::FETCH_ASSOC);
            if($query->rowCount() > 0) {
                if(password_verify($password, $userRow['password'])) {
                    $_SESSION['user_id'] = $userRow['user_id'];
                    return true;
                } else {
                    return false;
                }
            }
        } catch(PDOException $e) {
           echo $e->getMessage();
       }
    }

    public function register($username, $password, $confirm_password, $email) {
        $db = new CloudSql;
        $conn = $db->connection();
        printf("hi");
        try {
            if($password === $confirm_password) {
                $new_password = password_hash($password, PASSWORD_DEFAULT);
            }
            $stmt = $this->db->prepare("INSERT INTO User (username,email,password) VALUES(:uname, :umail, :upass)");
              
            $stmt->bindparam(":uname", $username);
            $stmt->bindparam(":umail", $email);
            $stmt->bindparam(":upass", $password);
            return $stmt; 
            // the actual statement expression will be done elsewhere
        } catch(PDOException $e) {
           echo $e->getMessage();
        }    
    }

    public function is_loggedin() {
        if(isset($_SESSION['user_id'])) {
            return true;
        }
    }

    public function logout() {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

    public function getUser($username) {
        // username is unique in db, so you can just use this to get the user
        
        return $user_id;
    }
}
?>