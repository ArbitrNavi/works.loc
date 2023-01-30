<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style.css">
    <title>Тестовый проект</title>
</head>
<body>
<div class="user-profile">
    <?php
    $userProfile = [
        'name' => 'Мурат Гергов',
        'background' => 'zakat.jpg',
        'avatar' => 'avatar.jpg',
    ];

    ?>
    <div class="background">
        <img src="./img/<?php echo $userProfile['background'];?>" alt="">
    </div>
    <div class="user-status">
        <div class="avatar">
            <img src="./img/<?php echo $userProfile['avatar']; ?>" alt="">
        </div>
        <p class="user-name">
            <?php echo $userProfile['name']; ?>
        </p>
    </div>
</div>

    <form class="post" action="getData.php" method="post" enctype="multipart/form-data">
        <input class="btn" type="file" name="image">
        <input class="btn" type="submit" value="Отправить">
    </form>
</body>
</html>

