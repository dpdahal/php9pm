<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'php9pm');
$sql = "SELECT * FROM gallery";
$getResponse = mysqli_query($connection, $sql);

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
    <h1>Upload Image</h1>
    <hr>

    <?php if (isset($_SESSION['success']))  : ?>
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
    <?php endif ?>

    <?php if (isset($_SESSION['error']))  : ?>
        <?php
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        ?>
    <?php endif ?>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <br><br>
        <button>Add Record</button>
    </form>

    <hr>
    <?php foreach ($getResponse as $item) : ?>
        <img src="images/<?= $item['image_name']; ?>" width="400" alt="">
    <?php endforeach; ?>
</blockquote>
</body>
</html>