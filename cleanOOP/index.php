<?php

include "DataBase.php";

DataBase::getInstance()->delete('users', ['username', '=', 'Murat']);

$users = DataBase::getInstance()->get('users', ['username', '=', 'Alex']);

// if ($users->error()) {
//     echo "We have error";
// } else {
//     foreach ($users->result() as $user) {
//         echo $user->id . ". " . $user->username . "<br>";
//     }
// }



