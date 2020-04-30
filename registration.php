<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('includes.php') ?>
    <script src="/jquery-3.5.0.min.js"></script>
    <script src="/js/registration.js"></script>
    
    <title>Document</title>
</head>
<body>
    <?php include('blocks/header/header.php') ?>
    <div id="main">
        <div class="t1">Регистрация</div>
        <form method="post" action="reg.php">
            Логин: <input id="login" type="text" name="login" pattern="[0-9a-zA-Z]{6,18}" /><br />
            Пароль: <input id="pass" type="password" name="password" pattern="[0-9a-zA-Z]{6,18}"/><br />
            Подтверждение: <input id="re_pass" type="password" name="password2" /><br />
            Имя: <input id="name" type="text" name="Name"pattern="^[А-Яа-яЁё\s]+$"><br/>
            Email: <input id="mail" type="email" name="mail" /><br />
            <input id="pers" type="checkbox" name="pers" /> Даю своё согласие на обработку персональных данных.<br />
            <input type="submit" id="sub" name="GO" value="Регистрация" disabled>
        </form>
        <div class="errors">
        </div>
    </div>
    
</body>
</html>