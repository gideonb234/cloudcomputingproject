<?php
// It handles users what more do you want 
class User {

    private $email;
    private $password;
    private $name;

    public function login() {
        // Use bcrypt here
    }

    public function register() {
        // Use bcrypt here
    }

    public function validatePassword($password) {

    }

    public function getUser($user_id) {

    }

    public function setPassword($user_id, $new_pass) {

    }

    public function setEmail($user_id, $new_email) {
        // get user as an object, set their email
    }
}
?>