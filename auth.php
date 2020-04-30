<?php
    session_start();
    if ( isset($_POST['GO']) )
    {
        $login=$_POST['login'];
        $password=md5($_POST['password']);
        require_once 'dbconnect.php';
        $link=mysqli_connect($host,$user,$pas,$database) or die ("Error" . mysqli_error($link));
        $query = "SELECT * FROM profile WHERE Nickname='$login' AND Password='$password'";
        $result = mysqli_query($link,$query);
        $myrow = mysqli_fetch_array($result);
        if ( !empty($myrow['Nickname']) )
        {
            $_SESSION['logged_user'] = $login;
            header('Location: '. 'index.php');
        }
    
        else
        {
            $errors[] = 'Пользователь с таким логином или паролем не найден!';
        }
        
        if ( ! empty($errors) )
        {
            //выводим ошибки авторизации
            echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
        }
    
    }
?>