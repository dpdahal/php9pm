<?php
session_start();

if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username === 'admin' && $password === 'admin@002') {
        $_SESSION['username'] = $username;
        $_SESSION['is_login'] = true;
        header('Location:welcome.php');
    } else {
        $_SESSION['error'] = "username & password not match";
        header('Location:index.php');
    }
} else {
    header('Location:index.php');
}