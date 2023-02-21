<?php

class DataBase
{
    private static $instance = null;

    private $pdo, $query, $result, $error = false, $count;

    private function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=marlin_clean_oop;', "root", "");
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new DataBase();
        }
        return self::$instance;
    }

    public function query($sql)
    {
        $this->error = false;
        $this->query = $this->pdo->prepare($sql);
        if (!$this->query->execute()){
            $this->error = true;
        } else {
            $this->result = $this->query->fetchAll(PDO::FETCH_OBJ);
            $this->count = $this->query->rowCount();
        }
        return $this;
    }

    public function result()
    {
        return $this->result;
    }


    public function getCount()
    {
        return $this->count;
    }


    public function error()
    {
        return $this->error;
    }
}