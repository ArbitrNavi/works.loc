<?php

require ('function.php');

var_dump(__DIR__);

if (!empty($_FILES['avatar'])){
    $file = $_FILES['avatar'];
    $name = $file['name'];
    $upOne = dirname(__DIR__, 1);

    $pathFile = $upOne . '/img/demo/avatars/' . $name;

    if (!move_uploaded_file($file['tmp_name'], $pathFile)){
        echo 'Файл не смог загрузиться';
    }

    setUserField($_GET['id'], 'avatar', $name);
    redirect_to('../users.php');
}
