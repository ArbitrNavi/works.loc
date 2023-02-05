<?php

session_start();

require "function.php";

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$currentEmail = get_user_with_email($email);

if (!empty($currentEmail)){
    $_SESSION['alert'] = 'Этот эл. адрес уже занят другим пользователем.';
    redirect_to('./../page_register.php');
} else {
    $_SESSION['flesh-message'] = "Регистрация успешна";
    $_SESSION['alert'] = 'success';
    add_user_db($email, $password);
    redirect_to('./../page_login.php');
}





