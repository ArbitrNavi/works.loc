<?php

include "./function.php";
$db = include "./dataBase/start.php";

$db->create("Posts", [
    'text' => $_POST['text'],
]);


header('Location: index.php');
