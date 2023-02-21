<?php

include "DataBase.php";

$users = DataBase::getInstance()->query("SELECT * FROM users");
echo "<pre>";
var_dump($users);
echo "</pre>";
