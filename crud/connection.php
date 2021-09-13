<?php

session_start();

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "php9pm"
);

if (!$conn) {
    echo "database connection errors.";
    die();
}