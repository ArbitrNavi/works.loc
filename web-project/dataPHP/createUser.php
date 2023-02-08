<?php

session_start();

require("./function.php");


$email     = $_POST['email'];
$password  = $_POST['password'];
$name      = $_POST['name'];
$job       = $_POST['job'];
$phone     = $_POST['phone'];
$address   = $_POST['address'];
$status    = $_POST['status'];
$vk        = $_POST['vk'];
$telegram  = $_POST['telegram'];
$instagram = $_POST['instagram'];

var_dump($_FILES['secondary']);

if (!empty(get_user_with_email($email))) {
    $_SESSION['flesh-message'] = "Пользователь с таким email уже существует";
    $_SESSION['alert']         = 'danger';
    redirect_to("./../create_user.php");
} else {
    $_SESSION['flesh-message'] = "Профиль успешно добавлен.";
    $_SESSION['alert']         = 'success';
    add_user_db($email, $password);
    $currentID = get_user_with_id($email);


    if ($_FILES['secondary']['name'] == "") {
        $avatar = 'unknow_user.png';
        setUserField($currentID, 'avatar', $avatar);
    } else if (!empty($_FILES['secondary'])) {
        $file    = $_FILES['secondary'];
        $imgName = $file['name'];
        $upOne   = dirname(__DIR__, 1);

        $pathFile = $upOne . '/img/demo/avatars/' . $imgName;

        if (!move_uploaded_file($file['tmp_name'], $pathFile)) {
            echo 'Файл не смог загрузиться';
        }

        setUserField($currentID, 'avatar', $imgName);
    }
    setUserField($currentID, 'name', $name);
    setUserField($currentID, 'job', $job);
    setUserField($currentID, 'phone', $phone);
    setUserField($currentID, 'address', $address);
    setUserField($currentID, 'status', $status);
    setUserField($currentID, 'vk', $vk);
    setUserField($currentID, 'telegram', $telegram);
    setUserField($currentID, 'instagram', $instagram);

    redirect_to('./../users.php');
}



