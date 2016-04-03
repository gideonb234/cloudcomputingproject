<?php
    require_once 'users.php';
    require_once 'config-sql.php';
    if(isset($_POST['login_form'])) {
	$user = new User();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $user->login($username, $password);
        session_start();
        $_SESSION['user_id'] = $id;
        header("Location:../loggedIn.php");
    }
    if(isset($_POST['register_form'])) {
        $user = new User();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $email = $_POST['email'];
        $user->register($username, $password, 
            $confirm_password, $email);
        header("Location:../index.php");
    }
?>
