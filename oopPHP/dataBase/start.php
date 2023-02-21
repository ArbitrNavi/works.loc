<?php
include_once "QueryBuilder.php";
include_once "Connection.php";

$config = include_once "config.php";


return new QueryBuilder(Connection::make($config['databases']));
