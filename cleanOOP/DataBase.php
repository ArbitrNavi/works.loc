<?php

class DataBase
{
    private static $instance = null;

    private $pdo;

    private function __construct()
    {
        try{
            $this->pdo = new PDO('mysql:host=localhost;dbname=marlin_clean_oop;', "root", "");
            echo "Hello World";
        } catch (PDOException $exception){
            die($exception->getMessage());
        }
    }

    public static function getInstance(){
        if (!isset(self::$instance)){
            self::$instance = new DataBase();
        }
        return self::$instance;
    }
}