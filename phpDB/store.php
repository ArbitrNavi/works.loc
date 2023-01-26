<?php 

$pdo = new PDO('mysql:host=localhost;dbname=databases', 'root', '');
$sql = "INSERT INTO users (username) VALUES (:username)";
$statement = $pdo->prepare($sql);
$statement->execute($_POST);

header('Location: index.php');