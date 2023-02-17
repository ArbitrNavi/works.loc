<?php
include "./function.php";
$db = include "./dataBase/start.php";

$user = $db->getOne('Posts', $_GET['id']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        <?php echo $user['text'] ?>
    </h1>
</body>
</html>
