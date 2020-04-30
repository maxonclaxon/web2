<?php
 if(isset($_POST)){
     session_start();
    $nickname=$_SESSION['logged_user'];
    $title=$_POST['title'];
    $message=$_POST['message'];
    $date=date("y-m-d H:i:s");
    $uploaddir="files/".$nickname."/";
    echo count($_FILES['userfile']['name']);
    $filename = "";
    for($i=0;$i<count($_FILES['userfile']['name']);++$i){
        $uploadfile=$uploaddir.basename($_FILES['userfile']['name'][$i]);
        move_uploaded_file($_FILES['userfile']['tmp_name'][$i],$uploadfile);
        $filename.= $_FILES["userfile"]["name"][$i].";";
    }
    $filename = substr($filename,0,-1);
    require_once 'dbconnect.php';
    $link=mysqli_connect($host,$user,$pas,$database) or die ("Error" . mysqli_error($link));
   
    $query = "INSERT INTO post (Nickname,Title,Message,Datetime,Filenames) VALUES('$nickname','$title','$message','$date','$filename')";
    if(mysqli_query($link,$query)){
        echo('пост успешно создан!');
    }
    else{
        echo 'Ошибка при создании поста';
    }
 }
 else{
     header('Location'.'index.php');
 }

?>