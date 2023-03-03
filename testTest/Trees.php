<?php

class Trees
{
    private $pdo, $appleTrees, $pearTrees;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=Trees", "root", "");
    }


    /*
     *
     * $table = Яблоки("Apples"), Груши ("Pears")
     *
     * */
    public function getAll($table)
    {
        $sql       = "SELECT * FROM {$table}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTree($table)
    {
        $sql = "INSERT INTO {$table}"
    }
}