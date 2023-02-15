<?php
include "dataBase/QueryBuilder.php";
include "dataBase/Connection.php";

$config = include "config.php";


return new QueryBuilder(Connection::make($config['databases']));
