<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('includes.php') ?>
    <title>Document</title>
</head>
<body>
    <?php include('blocks/header/header.php') ?>
    <div id="main">
        <?php
        $login = $_POST['login'];
        $password=$_POST['password'];
        $name=$_POST['Name'];
        $mail=$_POST['mail'];
        
        //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
        $login = stripslashes($login);
        $login = htmlspecialchars($login);
        $password = stripslashes($password);
        $password = htmlspecialchars($password);
        $name=stripslashes($name);
        $name=htmlspecialchars($name);
        $mail=stripslashes($mail);
        $mail=htmlspecialchars($mail);
    //удаляем лишние пробелы
        $login = trim($login);
        $password = md5(trim($password));
        $mail=trim($mail);
        require_once 'dbconnect.php';
        $link=mysqli_connect($host,$user,$pas,$database) or die ("Error" . mysqli_error($link));
    // проверка на существование пользователя с таким же логином
        $query = "SELECT Nickname FROM profile WHERE Nickname='$login'";
        $result = mysqli_query($link,$query);
        $myrow = mysqli_fetch_array($result);
        if (!empty($myrow['Nickname'])) {
        exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
        }
    // если такого нет, то сохраняем данные
        $result2 = mysqli_query ($link,"INSERT INTO profile (Nickname,Password,Name,Email,Access) VALUES('$login','$password','$name','$mail','0')");
        // Проверяем, есть ли ошибки
        if ($result2=='TRUE')
        {
            mkdir('files/'.$login);
        echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
        }
    else {
        echo "Ошибка! Вы не зарегистрированы. ";
        }
        
        ?>
    </div>
</body>
</html>