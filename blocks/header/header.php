<div id="header">
    <a href="/index.php"><img src="/images/logo.png" alt="logo"></a>
    <div id="profile" class="unauthorized">
        <?php 
            if(!isset($_SESSION['logged_user'])) echo '<ul id="auth">
            <li><span class="t2 ">Вы не авторизованы!</span></li>
            <li><a href="/authorization.php">Вход</a></li>
            <li><a href="/registration.php">Регистрация</a></li>
        </ul>';
            else{
                echo ' <ul>
                <li>Добро пожаловать, '; echo $_SESSION['logged_user'];echo '</li>  
                <li><a href="/makepost.php">Создать запись</a></li>
                <li><a href="/logout.php">Выход</a></li>
                </ul>';
            }
        ?>
       
    </div>
</div>