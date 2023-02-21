<?php

$pdo = new PDO("mysql:host=localhost;dbname=databases;", "root", "");
$sql = 'UPDATE user username=:username WHERE id=:id';

$statement = $pdo->prepare($sql);
$statement->execute($_POST);

header("Location: about.php");
