<?php
session_start();

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
    <h1>Login </h1>
    <?php if (isset($_SESSION['error'])) : ?>
        <h1 style="color: red;"><?= $_SESSION['error']; ?></h1>

        <?php unset($_SESSION['error']); ?>

    <?php endif; ?>

    <form action="validation.php" method="post">
        <label for="name">Username</label> <br><br>
        <input type="text" name="username" id="name"> <br> <br>

        <label for="password">Password</label> <br><br>
        <input type="password" name="password" id="password"> <br> <br>
        <button>Login</button>
    </form>
</blockquote>
</body>
</html>