<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('includes.php'); session_start(); ?>
    
    <title>Document</title>
</head>
<body>
    <?php include('blocks/header/header.php') ?>
    <div id="main">

        <form id="Postfile" method="post" action="post.php"  enctype="multipart/form-data">
            <input  value="12333"  type="text" name="title" value="Название поста"><br>
            <input type="text" name="message" value="Сообщение"><br>
            <input class="inpfile" type="file" name="userfile[]" value="Файлы" multiple ><br>
            <input type="submit" name="GO" value="Запостить">
            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />   
        </form>
    </div>
</body>
</html>