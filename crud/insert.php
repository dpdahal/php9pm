<?php

require_once "connection.php";


if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $sql = "INSERT INTO students(name,email,address,phone)
            VALUES('$name','$email','$address','$phone')";

    $response = mysqli_query($conn, $sql);
    if ($response) {
        $_SESSION['success'] = "data was successfully inserted";
        header('Location:index.php');
        exit();

    } else {
        $_SESSION['error'] = "Data not inserted";
        header('Location:index.php');
        exit();
    }

} else {
    $_SESSION['error'] = "Invalid Access";
    header('Location:index.php');
    exit();
}