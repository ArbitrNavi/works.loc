<?php

include_once "../function.php";
$db = include_once '../dataBase/start.php';

$posts = $db->getAll('Posts');

$route = [
    "/oopPHP/"     => "../function/index.view.php",
    "/oopPHP/edit" => "../function/edit.php",
];

$routes = $_SERVER['REQUEST_URI'];


if (array_key_exists($routes, $route)){
    include $route[$routes];
}
//include '../index.view.php';