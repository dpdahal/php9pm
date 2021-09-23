<?php
session_start();


if (!function_exists('base_url')) {
    function base_url($path = '')
    {
        $path = trim($path, '/');
        $http = $_SERVER['REQUEST_SCHEME'];
        $localhost = $_SERVER['SERVER_NAME'];
        return $http . "://" . $localhost . '/php9pm/' . $path;
    }
}