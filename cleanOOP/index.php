<?php

include "DataBase.php";
include "Config.php";

$GLOBALS['config'] = [
    'mysql' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'marlin_clean_oop',
    ]
];

// DataBase::getInstance()->delete('users', ['username', '=', 'Murat']);

$id = 6;

DataBase::getInstance()->update('users', $id, [
    'username' => 'Murat',
    'password' => 123456711,
]);

$users = DataBase::getInstance()->get('users', ['username', '=', 'Murat'])->result();

print_r($users);


