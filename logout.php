<?php
    include_once("backend/users.php");
    $user = new User();
    $user->logout();
    header("Location:index.php");
?>