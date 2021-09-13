<?php

require_once "connection.php";

if (!empty($_GET['criteria'])) {
    if ((int)$_GET['criteria']) {
        $id = $_GET['criteria'];
        $sql = "DELETE FROM students WHERE id='$id'";
        $response = mysqli_query($conn, $sql);
        if ($response) {
            $_SESSION['success'] = "Data was deleted";
            header('Location:index.php');
            exit();
        } else {
            $_SESSION['error'] = "There was a problems";
            header('Location:index.php');
            exit();
        }
    } else {
        $_SESSION['error'] = "Invalid criteria";
        header('Location:index.php');
        exit();
    }


} else {
    $_SESSION['error'] = "Invalid Access";
    header('Location:index.php');
    exit();
}