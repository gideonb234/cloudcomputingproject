<?php
// It handles users what more do you want 

include_once '../error-enable.php';

class User {

    private $email;
    private $password;
    private $name;

    public function login() {
        // Use bcrypt here (and db connection yes)
    }

    public function register() {
        // Use bcrypt here (and db connection yes)
    }

    public function validatePassword($password) {

    }

    public function getUser($user_id) {

    }
}
?>