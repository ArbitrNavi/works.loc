<?php
include "dataBase/QueryBuilder.php";
include "dataBase/Connection.php";

return new QueryBuilder(Connection::make());
