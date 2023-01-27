<?php
session_start();

$text = $_POST["userInput"];

$pdo = new PDO("mysql:host=localhost;dbname=databases;", "root", "");
$sql = "INSERT INTO texts (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(["text" => $text]);







