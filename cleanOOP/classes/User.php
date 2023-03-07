<?php


namespace classes;

use DataBase;

class User
{
    private $db;

    public function __construct()
    {
        $this->db = DataBase::getInstance();
    }

    public function create($fields = [])
    {
        $this->db->insert("users", $fields);
    }
}