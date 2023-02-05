<?php

$email = $_POST['email'];
$password = $_POST['password'];

$pdo = new PDO('mysql:host=localhost;dbname=testProject', "root", "");



//$addBD = 'INSERT INTO autorization (email, password) VALUES (:email, :password)';
//$statement = $pdo->prepare($addBD);
//$statement->execute(['email' => $email, "password" => $password]);


$selectData = 'SELECT * FROM autorization WHERE email=:email';
$statement = $pdo->prepare($selectData);
$statement->execute(["email" => $email]);
$userData = $statement->fetch(PDO::FETCH_ASSOC);

if ($userData['password'] == $password){
    echo 'Доступ разрешён';
} else {
    echo "Доступ запрщён";
}
