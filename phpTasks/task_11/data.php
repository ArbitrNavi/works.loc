<?php
session_start();

$text = $_POST['text'];
$email = $_POST['email'];

$pdo = new PDO("mysql:host=localhost;dbname=testProject;", "root", "");

$sql = "SELECT * FROM text WHERE (email=:email)";
$statement = $pdo->prepare($sql);
$statement->execute(["email" => $email]);
$value = $statement->fetch(PDO::FETCH_ASSOC);

$array = [
    'access' => [],
    'error' => [],
];

if (!empty($value)) {
    $_SESSION['text'] = 'Видно';
    $_SESSION['error'][] = $email;
} else {
    $sql = "INSERT INTO text (text, email) VALUES (:text, :email)";
    $statement = $pdo->prepare($sql);
    $statement->execute(["text" => $text, "email" => $email]);
    $_SESSION['access'][] = $email;
}





//session_destroy();
header("Location: task_11.php");