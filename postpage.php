<?php
    if(!$_GET['postid']){
        header('Location: '.'index.php');
    }
    else{
        session_start();
        $id=$_GET['postid'];
        require_once 'dbconnect.php';
        $link = mysqli_connect($host,$user,$pas,$database) or die ("Error" . mysqli_error($link));
        $query = "SELECT * FROM post where id = $id";
        $result = mysqli_fetch_array(mysqli_query($link,$query));
        $files=explode(";",$result['Filenames']);

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('includes.php')?>
    <title>Пост</title>
</head>
<body>
    <?php include('blocks/header/header.php') ?>
    <div id="main">

       <div class="t1"><?php echo $result['Title']?></div>
       <div id="message" class="t2"><?php echo $result['Message']?></div>
       <div id="date" class="t2"><?php echo $result['Datetime']?> </div>
       <div id="author" class="t2">Добавил :<?php echo $result['Nickname']?> </div>
       <div id="files">
           <?php 
            foreach($files as $file){
                echo '<a class="files" href="/files/';echo $result['Nickname']."/".$file;echo'"> '.$file.', </a>';
            }
           ?>
       </div>


    </div>
</body>
</html>