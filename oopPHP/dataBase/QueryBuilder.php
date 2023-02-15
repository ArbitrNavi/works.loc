<?php

class QueryBuilder
{

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    function getAll($table)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}"); //ЗАПРОС SELECT
        $statement->execute(); //ПОЛУЧИТЬ РЕЗУЛЬТАТ
        return $statement->fetchAll(PDO::FETCH_ASSOC); //ПЕРЕДАЕМ ДАННЫЕ В ПЕРЕМЕННУЮ USER
    }
}