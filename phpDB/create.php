
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div>
        <form action="store.php" method="post">
            <label for="username">
                Имя пользователя
                <input type="text" name="username">
            </label>
            <label for="email">
                Email
                <input type="text" name="email" >
            </label>
            <button type="submit" class="btn">Добавить</button>
        </form>
    </div>
</body>
</html>