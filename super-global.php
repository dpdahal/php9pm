<?php

//$name=$_GET['name'];
//
//echo $name;

//if(!empty($_GET)){
//    echo $_GET['name'];
//}

//print_r($_POST);

//
if (!empty($_POST)) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    echo "<h1>your name is {$name} </h1>";
    echo "<h1>Password: {$password} </h1>";
}

?>


<form action="" method="post">
    <input type="text" name="name">
    <input type="password" name="password">
    <button>Add</button>
</form>



