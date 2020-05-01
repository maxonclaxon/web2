<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('includes.php') ?>
    
    <title>Авторизация</title>
</head>
<body>
    <?php include('blocks/header/header.php') ?>
    <div id="main">
        <div class="t1">Авторизация</div>
        <form method="post" action="auth.php">
            Логин: <input id="login" type="text" name="login" /><br />
            Пароль: <input id="pass" type="password" name="password" /><br />
            <input type="submit" name="GO" value="Авторизация">
        </form>
    </div>
</body>
</html>