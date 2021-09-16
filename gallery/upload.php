<?php
session_start();

$connection = mysqli_connect('127.0.0.1',
    'root', '',
    'php9pm');

if (!$connection) {
    die('database connection errors');
}

if (!empty($_FILES)) {
    $getExt = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $imageName = md5(microtime()) . '.' . $getExt;
    $tmpName = $_FILES['image']['tmp_name'];
    if (move_uploaded_file($tmpName, 'images/' . $imageName)) {
        $sql = "INSERT INTO gallery(image_name)VALUES('$imageName')";
        mysqli_query($connection, $sql);
        $_SESSION['success'] = "image was upload";
        header('Location:index.php');
    } else {
        $_SESSION['error'] = "There was a problems";
        header('Location:index.php');
    }

} else {
    header('Location:index.php');
}
