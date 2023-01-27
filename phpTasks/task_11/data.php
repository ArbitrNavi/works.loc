<?php
session_start();

$_SESSION["window"] = "none";

$text = $_POST['text'];

$pdo = new PDO("mysql:host=localhost;dbname=databases;", "root", "");

$sql = "SELECT * FROM texts WHERE text=:text";
$statement = $pdo->prepare($sql);
$statement->execute(["text" => $text]);
$value = $statement->fetch(PDO::FETCH_ASSOC);




if($value["text"] == $text){
    $_SESSION["text"] = "Значение уже присутствует в таблице";
    $_SESSION["window"] = "block";
} else if ($value["text"] != $text) {
    $_SESSION["window"] = "none";
    $sql = "INSERT INTO texts (text) VALUES (:text)";
    $statement = $pdo->prepare($sql);
    $statement->execute(["text" => $text]);
}




header("Location: task_11.php");