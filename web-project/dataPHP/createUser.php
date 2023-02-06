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
    edited_user_values($email, $name, $job, $tel, $address, $status, $avatar, $vk, $telegram, $instagram);
    redirect_to('./../users.php');
}


