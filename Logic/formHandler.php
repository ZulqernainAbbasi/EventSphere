<?php

require_once "loginLogic.php";

if (isset($_POST['login'])) {
    $login = new Login($_POST['email'], $_POST['password']);
    if (!$login->authenticate()) {
        echo "Invalid email or password";
    }
}

if (isset($_POST['signup'])) {
    $signup = new SignUp(
    $_POST['fullname'],
    $_POST['email'],
    $_POST['password'],
    $_POST['confirm_password'],
    $_FILES['profile_pic'],
    $_POST['bio'],
    $_POST['role'] 
);

    $result = $signup->register();
    echo is_bool($result) ? header("location:../Auth/login.php") : $result;
}


?>