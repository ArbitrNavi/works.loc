<?php

session_start();

require("./function.php");


$email     = $_POST['email'];
$password  = $_POST['password'];
$name      = $_POST['name'];
$job       = $_POST['job'];
$tel       = $_POST['tel'];
$address   = $_POST['address'];
$status    = $_POST['status'];
$avatar    = $_POST['avatar'];
$vk        = $_POST['vk'];
$telegram  = $_POST['telegram'];
$instagram = $_POST['instagram'];


if (!empty(get_user_with_email($email))) {
    $_SESSION['flesh-message'] = "Пользователь с таким email уже существует";
    $_SESSION['alert']         = 'danger';
    redirect_to("./../create_user.php");
} else {
    add_user_db($email, $password);
    $currentID = get_user_with_id($email);
    if (!empty($avatar)){
        setUserField($currentID, 'avatar', $avatar);
    } else {
        $avatar = 'img/demo/avatars/avatar-m.png';
        setUserField($currentID, 'avatar', $avatar);
    }
    setUserField($currentID, 'name', $name);
    setUserField($currentID, 'job', $job);
    setUserField($currentID, 'phone', $tel);
    setUserField($currentID, 'address', $address);
    setUserField($currentID, 'status', $status);
    setUserField($currentID, 'vk', $vk);
    setUserField($currentID, 'telegram', $telegram);
    setUserField($currentID, 'instagram', $instagram);

    redirect_to('./../users.php');
}



