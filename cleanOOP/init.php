<?php

session_start();


require_once("classes/DataBase.php");
require_once("classes/Config.php");
require_once("classes/Validate.php");
require_once("classes/Input.php");
require_once("classes/Token.php");
require_once("classes/Session.php");
require_once("classes/User.php");
require_once("classes/Redirect.php");

$GLOBALS['config'] = [
    'mysql'   => [
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'marlin_clean_oop',
    ],
    'session' => [
        'token_name' => 'token',
    ]

];
