<?php

require ('function.php');

if (!empty($_FILES['avatar'])){
    $file = $_FILES['avatar'];
    $name = $file['name'];
    $pathFile =  __DIR__ . '/../img/demo/avatars/' . $name;
    var_dump($pathFile);

    if (!move_uploaded_file($file['tmp_name'], $pathFile)){
        echo 'Файл не смог загрузиться';
    }

//    redirect_to('../users.php');
}
