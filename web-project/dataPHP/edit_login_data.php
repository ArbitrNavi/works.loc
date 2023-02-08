<?php

require ('function.php');
var_dump($_POST);

$email = $_POST['email'];
$current_password = $_POST['current_password'];
$verify_password = $_POST['verify_password'];

if ($current_password == $verify_password){
    $_SESSION['flesh-message'] = 'Профиль успешно обновлён.';
    $_SESSION['alert'] = 'success';
    setUserField($_GET['id'], 'email', $email);
    setUserField($_GET['id'], 'password', $current_password);
    redirect_to('../users.php');
} else {
    $_SESSION['flesh-message'] = 'Пароли не совпадают.';
    $_SESSION['alert'] = 'danger';
    redirect_to('../security.php');
}