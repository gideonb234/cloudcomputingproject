<?php
    require_once 'users.php';
    require_once 'config-sql.php';
    if(isset($_POST['login_form'])) {
        echo "login form";
    }
    if(isset($_POST['register_form'])) {
        $user = new User();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $email = $_POST['email'];
        $user->register($username, $password, 
            $confirm_password, $email);
        echo "cloud connection";
    }
?>
