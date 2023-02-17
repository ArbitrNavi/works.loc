<?php

class QueryBuilder
{

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll($table)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}"); //ЗАПРОС SELECT
        $statement->execute(); //ПОЛУЧИТЬ РЕЗУЛЬТАТ
        return $statement->fetchAll(PDO::FETCH_ASSOC); //ПЕРЕДАЕМ ДАННЫЕ В ПЕРЕМЕННУЮ USER
    }

    public function create($table, $value)
    {
        $key    = implode(", ", array_keys($value));
        $values = ":" . implode(", :", array_keys($value));

        $sql       = "INSERT INTO {$table} ({$key}) VALUES ({$values})";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($value);
    }

    public function getOne($table, $id)
    {
        $sql       = "SELECT * FROM {$table} WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            'id' => $id,
        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($table, $data, $id)
    {
        $keys = array_keys($data);
        $string = "";
        foreach ($keys as $key){
            $string .= $key . "=:" . $key . ",";
        }
        $data['id'] = $id;
        $keys = rtrim($string, ",");
        $sql = "UPDATE {$table} SET {$keys} WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
        dd($statement);
    }
}