<?php

class Connection
{
    public static function make($config)
    {
        return new PDO("{$config['host']};dbname={$config['databases']};", "{$config['user']}", "{$config['password']}");
    }
}