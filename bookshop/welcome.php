<?php

session_start();

if (!isset($_SESSION['username']) or $_SESSION['is_login'] != true) {
    $_SESSION['error'] = "Please login first";
    header('location:index.php');
    exit();
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<blockquote>
    <h1>Welcome: <?= $_SESSION['username']; ?></h1>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur fuga harum iure nostrum rerum. Ab
        aspernatur distinctio ex facilis laborum libero, neque, nulla placeat, qui quisquam quo soluta temporibus vero.
    </p>

    <a href="logout.php">Logout</a>
</blockquote>

</body>
</html>