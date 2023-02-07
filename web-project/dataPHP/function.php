<?php

session_start();


function connect_db()
{
    $pdo = new PDO('mysql:host=localhost;dbname=testProject;', "root", "");
    return $pdo;
}

function my_profile($user, $currentUser)
{
    if ($user['id'] == $currentUser['id']) {
        return true;
        exit;
    }
    return false;
}

function is_admin($data)
{
    if ($data['role'] == 'admin') {
        return true;
        exit;
    };
    return false;
}

function get_all_users()
{
    $pdo       = connect_db();
    $sql       = 'SELECT * FROM users';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function is_loggin()
{
    if (isset($_SESSION['user'])) {
        return true;
    }
    return false;
}

function is_not_loggin()
{
    return !is_loggin();
}

function redirect_to($path)
{
    return header("Location: $path");
}

function login($email, $password)
{
    $userData = get_user_with_email($email);

    if ($password == $userData['password']) {
        $_SESSION['user'] = $userData;
        redirect_to("./../users.php");
    } else {
        $_SESSION['flesh-message'] = "Неверный логин или пароль";
        $_SESSION['alert']         = "danger";
        redirect_to("./../page_login.php");
    }
}


function get_user_with_email($email)
{
    $pdo       = connect_db();
    $sql       = "SELECT * FROM users WHERE email=:email";
    $statement = $pdo->prepare($sql);
    $statement->execute(
        [
            'email' => $email,
        ]
    );
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function get_user_with_id($email)
{
    $result = get_user_with_email($email)['id'];
    return $result;
}

function add_user_db($email, $password)
{
    $pdo       = connect_db();
    $sql       = 'INSERT INTO users (email, password) VALUES (:email, :password)';
    $statement = $pdo->prepare($sql);
    $statement->execute(
        [
            'email'    => $email,
            'password' => $password,
        ]
    );
}

function setUserField($id = false, $field = false, $value = null)
{
    if ($id && $field) {
        $setData = [
            'id'    => $id,
            'value' => $value,
        ];

        $pdo       = connect_db();
        $sql       = 'UPDATE users SET ' . $field . '=:value WHERE id=:id';
        $statement = $pdo->prepare($sql);
        return $statement->execute($setData);
    } else {
        return false;
    }
}

function getUserField($id = false, $field = false)
{
    if ($id && $field) {
        $getData = [
            'id' => $id,
        ];

        $pdo       = connect_db();
        $sql       = 'SELECT ' . $field . ' FROM users WHERE id=:id';
        $statement = $pdo->prepare($sql);
        $statement->execute($getData);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result[$field];
    }
}

