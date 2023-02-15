<?php

include "./function.php";
$db = include './dataBase/start.php';


$posts = $db->getAll();


include 'index.view.php';


