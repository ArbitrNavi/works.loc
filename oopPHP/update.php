<?php

include "./function.php";
$db = include "./dataBase/start.php";

$db->update('Posts', $_POST, $_GET['id']);