<?php

require_once "connection.php";

if (!empty($_GET['criteria'])) {
    if ((int)$_GET['criteria']) {
        $id = $_GET['criteria'];
        $sql = "SELECT * FROM students WHERE id='$id'";
        $response = mysqli_query($conn, $sql);
        $student = mysqli_fetch_assoc($response);
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


if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $updateSql = "UPDATE students SET
                    name='$name',
                    email='$email',
                    address='$address',
                    phone='$phone'
                    WHERE id='$id'";

    $res = mysqli_query($conn, $updateSql);
    if ($res) {
        $_SESSION['success'] = "data was updated";
        header('Location:index.php');
        exit();

    } else {
        $_SESSION['error'] = "there was a problems";
        header('Location:index.php');
        exit();
    }

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Update Record</h1>
        </div>
        <div class="col-md-12">
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name"
                           value="<?= $student['name'] ?>" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" value="<?= $student['email'] ?>" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address"
                           value="<?= $student['address'] ?>" id="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone"
                           value="<?= $student['phone'] ?>"
                           id="phone" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary"> Update Record</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>

