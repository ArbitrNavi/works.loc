<?php

function getAllPosts(){
$pdo = new PDO("mysql:host=localhost;dbname=app;", "root", "");

$statement = $pdo->prepare("SELECT * FROM Posts"); //ЗАПРОС SELECT
$statement->execute(); //ПОЛУЧИТЬ РЕЗУЛЬТАТ
$posts = $statement->fetchAll(PDO::FETCH_ASSOC); //ПЕРЕДАЕМ ДАННЫЕ В ПЕРЕМЕННУЮ USER
return $posts;
}

function dd($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}