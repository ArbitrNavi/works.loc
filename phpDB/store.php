<?php 

$pdo = new PDO('mysql:host=localhost;dbname=databases', 'root', '');

$sql = "INSERT INTO users (username, email) VALUES (:username, :email)";
$statement = $pdo->prepare($sql);
$statement->execute($_POST);

header('Location: index.php');