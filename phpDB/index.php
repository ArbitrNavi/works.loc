<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>DataBases</title>
    <link rel="stylesheet" href="./style.css"/>
</head>
<body>
<div class="">
    <div class="contianer">
        <h1>Пользователи</h1>
        <a href="create.php" class="btn"> Добавить </a>
        <table>
            <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
            </thead>
            <tbody>
            <?php
            $pdo = new PDO("mysql:host=localhost;dbname=databases;", "root", "");
            $statement = $pdo->prepare("SELECT * FROM users");
            $statement->execute();
            $user = $statement->fetchAll(PDO::FETCH_ASSOC);

            ?>
            <?php foreach ($user as $value): ?>
                <tr class="padding">
                    <td><?php echo $value["id"] ?></td>
                    <td><?php echo $value["username"] ?></td>
                    <td><?php echo $value["email"] ?></td>
                    <td>
                        <a href="show.php?id=<?php echo $value["id"] ?>" class="btn btn-normal">Показать</a>
                        <a href="edit.php?id=<?php echo $value["id"] ?>" class="btn btn-warning">Изменить</a>
                        <a href="show.php?id=<?php echo $value["id"] ?>" class="btn btn-dangerous">Удалить</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
