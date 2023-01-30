<?php
session_start();

$email    = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$pdo = new PDO('mysql:host=localhost;dbname=testProject', "root", "");

$takeValue = 'SELECT * FROM userProfileData WHERE (email=:email)';
$statement = $pdo->prepare($takeValue);
$statement->execute(['email' => $email]);
$currentEmail = $statement->fetch(PDO::FETCH_ASSOC);

if (!empty($currentEmail)) {
    $_SESSION['status']     = "Этот эл адрес уже занят другим пользователем";
    $_SESSION['background'] = "danger";
} else {
    $_SESSION['status']     = "Электронный адрес успешно добавлен";
    $_SESSION['background'] = "success";
    $sql                    = 'INSERT INTO userProfileData (email, password) VALUES (:email, :password)';
    $statement              = $pdo->prepare($sql);
    $statement->execute(['email' => $email, 'password' => $password]);
}

header('Location: task_12.php');