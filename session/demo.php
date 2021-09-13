<?php

session_start();


echo $_SESSION['name'];

echo $_SESSION['age'];

unset($_SESSION['age']);
