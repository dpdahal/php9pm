<?php
require_once "config/config.php";
require_once "config/connection.php";

$registerErrors = [
    'full_name' => '',
    'user_name' => '',
    'email' => '',
    'user_password' => '',
    'confirm_password' => '',
    'gender' => ''
];

$oldRegisterData = [
    'full_name' => '',
    'user_name' => '',
    'email' => '',
    'gender' => ''
];

if (!empty($_POST) && isset($_POST['create_new_account'])) {


    /*
     * =============== check valida errors =========
     */
    foreach ($_POST as $key => $value) {
        if (empty($_POST[$key])) {
            $registerErrors[$key] = $key . ' Required';
        } else {
            $oldRegisterData[$key] = $value;
        }
    }

    /*
     * ======== check password match ============
     */
    $password = md5($_POST['user_password']);
    $confirm_password = md5($_POST['confirm_password']);

    if ($password != $confirm_password) {
        $registerErrors['user_password'] = 'password not match';
    }

    /*
     * ============ check valida email ============
     */

    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $registerErrors['email'] = "Enter validate email";
    }

    $sql = "SELECT * FROM users WHERE email='$email'";
    $res = mysqli_query($connection, $sql);
    $totalUsername = mysqli_num_rows($res);
    if ($totalUsername > 0) {
        $registerErrors['email'] = 'email already exists';
    }

    /*
     * ==========Username check ===========
     */
    $username = $_POST['user_name'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $res = mysqli_query($connection, $sql);
    $totalUsername = mysqli_num_rows($res);
    if ($totalUsername > 0) {
        $registerErrors['user_name'] = 'username already exists';
    }


    if (!array_filter($registerErrors)) {
        $name = $_POST['name'];
        $gender = $_POST['gender'];

        /*
         * ============ Insert query ===
         */

        $insertQuery = "INSERT INTO users(name,username,email,password,gender)
                      VALUES('$name','$username','$email','$password','$gender')";

        $response = mysqli_query($connection, $insertQuery);
        if ($response) {
            $_SESSION['success'] = "successfully register";
            header('Location:login-register');
            exit();

        } else {
            $_SESSION['error'] = "there was a problems";
            header('Location:login-register');
            exit();
        }

    }

}

$errors = [
    'username' => '',
    'password' => ''
];

$old = [
    'username' => ''
];


if (!empty($_POST) && isset($_POST['login_user'])) {

    foreach ($_POST as $key => $value) {
        if (empty($_POST[$key])) {
            $errors[$key] = $key . ' Required';
        } else {
            $old[$key] = $value;
        }
    }

    if (!array_filter($errors)) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $loginQuery = "SELECT * FROM users WHERE
                          username='$username' AND password='$password'";

        $getResponse = mysqli_query($connection, $loginQuery);
        $totalUser = mysqli_num_rows($getResponse);
        if ($totalUser > 0) {
            $users = mysqli_fetch_assoc($getResponse);
            $_SESSION['auth_id'] = $users['id'];
            $_SESSION['auth_name'] = $users['name'];
            $_SESSION['auth_username'] = $users['username'];
            $_SESSION['auth_email'] = $users['email'];
            $_SESSION['auth_gender'] = $users['gender'];
            $_SESSION['is_log_in'] = true;
            header('Location:index');
            exit();

        } else {
            $_SESSION['error'] = "Username & password not match";
            header('Location:login-register');
            exit();
        }


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
    <title>PHP9PM : : Login & Register </title>
    <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.css') ?>">
    <style>
        .top-header {
            width: 100%;
            min-height: 100px;
            background: #4267B2;
        }

        .my-login-button {
            margin-top: 29px;
        }
    </style>
</head>
<body>
<div class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1 style="margin-top: 20px;color: white;">Facebook </h1>
            </div>
            <div class="col-md-7">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="username">Username:
                                    <a style="color: red;"><?= $errors['username'] ?></a>
                                </label>
                                <input type="text" name="username"
                                       value="<?= $old['username']; ?>" id="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="password">Password:
                                    <a style="color: red;"><?= $errors['password'] ?></a>
                                </label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button name="login_user" value="login_page" class="btn btn-success my-login-button">Login
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h1>Connect with people</h1>
        </div>
        <div class="col-md-7">
            <h1>Create an new account</h1>

            <?php if (isset($_SESSION['success'])) : ?>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])) : ?>
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            <?php endif; ?>


            <form action="" method="post">
                <div class="form-group">
                    <label for="full_name">Full name:
                        <a style="color: red;"><?= $registerErrors['full_name']; ?></a>
                    </label>
                    <input type="text" name="full_name"
                           value="<?= $oldRegisterData['full_name'] ?>" id="full_name" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_name">Username:
                                <a style="color: red;"><?= $registerErrors['user_name']; ?></a>
                            </label>
                            <input type="text" name="user_name"
                                   value="<?= $oldRegisterData['user_name'] ?>"
                                   id="user_name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email:
                                <a style="color: red;"><?= $registerErrors['email']; ?></a>
                            </label>
                            <input type="text" name="email"
                                   value="<?= $oldRegisterData['email'] ?>"
                                   id="email" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_password">Password:
                                <a style="color: red;"><?= $registerErrors['user_password']; ?></a>
                            </label>
                            <input type="password" name="user_password" id="user_password" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password:
                                <a style="color: red;"><?= $registerErrors['confirm_password']; ?></a>
                            </label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="gender">Gender:
                        <a style="color: red;"><?= $registerErrors['gender']; ?></a>
                    </label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="" selected readonly>--- Select Gender ---</option>
                        <option value="male" <?= $oldRegisterData['gender'] == 'male' ? 'selected' : '' ?>>
                            Male
                        </option>
                        <option value="female" <?= $oldRegisterData['gender'] == 'female' ? 'selected' : '' ?>>Female
                        </option>
                        <option value="others" <?= $oldRegisterData['gender'] == 'others' ? 'selected' : '' ?>>Others
                        </option>
                    </select>

                </div>
                <div class="form-group">
                    <button name="create_new_account" value="create_news_account" class="btn btn-primary"> Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>