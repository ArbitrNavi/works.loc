<?php

include "./function.php";
$db = include './dataBase/start.php';

$posts = $db->getAll('Posts');

include 'index.view.php';