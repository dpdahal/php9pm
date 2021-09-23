<?php
require_once "config/config.php";
require_once "config/connection.php";


$requestUri = isset($_GET['uri']) ? $_GET['uri'] : 'home';
// remove .php extension
$requestUri = str_replace('.php', '', $requestUri);
$title = $requestUri;
// add custom .php extension
$requestUri = $requestUri . '.php';
$pagePath = 'pages/' . $requestUri;

/*
 * ==================Check login or not ==========
 */

if (!isset($_SESSION['auth_username']) or $_SESSION['is_log_in'] != true) {
    header('Location:login-register');
    exit();
}


?>

<?php require_once "header.php"; ?>
<?php require_once "menu.php"; ?>

<?php
if (file_exists($pagePath) && is_file($pagePath)) {
    require_once "pages/" . $requestUri;
} else {
    require_once "errors/404.php";
}
?>


<?php require_once "footer.php" ?>
