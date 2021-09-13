<?php

require_once "connection.php";

if (!empty($_GET['search'])) {
    $criteria = $_GET['search'];
    $query = "SELECT * FROM students 
                WHERE  name LIKE '%$criteria%' 
                OR email LIKE '%$criteria%'
                OR address LIKE '%$criteria%'
                OR phone LIKE '%$criteria%'";

    $studentResponse = mysqli_query($conn, $query);
} else {

    $query = "SELECT * FROM students ORDER BY id DESC";

    $studentResponse = mysqli_query($conn, $query);
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Student Record</h1>
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif ?>

            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <form action="insert.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-success"> Add Record</button>
                </div>
            </form>

        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">

                    <form action="" method="get">
                        <div class="row">
                            <div class="col-md-10" style="padding-right: 0;">
                                <div class="form-group">
                                    <input type="text" name="search" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-2" style="padding-left: 1px;">
                                <div class="form-group">
                                    <button class="btn btn-success">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>S.n</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($studentResponse as $key => $student) : ?>
                            <tr>
                                <td><?= ++$key; ?></td>
                                <td><?= $student['name'] ?></td>
                                <td><?= $student['email'] ?></td>
                                <td><?= $student['address'] ?></td>
                                <td><?= $student['phone'] ?></td>
                                <td>
                                    <a href="update.php?criteria=<?= $student['id'] ?>"
                                       class="btn-sm btn-primary">Edit</a>
                                    <a href="delete.php?criteria=<?= $student['id']; ?>"
                                       class="btn-sm btn-danger"
                                       onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>


</body>
</html>