<?php

include "DataBase.php";

$users = DataBase::getInstance()->query("SELECT * FROM users");

if ($users->error()){
    echo "We have error";
} else {
    foreach ($users->result() as $user){
        echo  $user->id . ". " . $user->username . "<br>";
    }
}



