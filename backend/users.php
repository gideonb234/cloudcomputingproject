<?php
// It handles users what more do you want 

include_once '../error-enable.php';

class User {

    public function login($username, $password) {
        // Use bcrypt here (and db connection yes)
        // save the user id to session
        // $_SESSION['user_id'] = $id;
        // $_SESSION['username'] = $username;
    }

    public function register($username, $password, $email) {
        // Use bcrypt here (and db connection yes)
        
    }

    public function validatePassword($password) {
        // check hash of password here
        
        
    }

    public function getUser($username) {
        // username is unique in db, so you can just use this to get the user
        
        return $user_id;
    }
}
?>