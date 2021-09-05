<?php

$name = 'sophia';

//echo "<h1>$name</h1>";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .box {
            width: 300px;
            height: 200px;
            background: red;
            float: left;
            margin: 10px;
        }
    </style>
</head>
<body>

<?php for ($x = 1; $x <= 10; $x++) { ?>
    <div class="box"> Box no: <?= $x; ?></div>
<?php } ?>

<!--foreach-->

</body>
</html>




