<?php
$pdo = new PDO("mysql:host=localhost;dbname=databases;", "root", "");
$statement = $pdo->prepare("SELECT * FROM users WHERE id=:id");
$statement->execute($_GET);
$user = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>DataBases</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./modal.css">
</head>
<body>
<div class="contianer">
    <h1>Пользователь <?php echo $user['username'] ?> </h1>
</div>
</body>
</html>
