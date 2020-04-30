<?php
    if(!$_GET) return;
    $id=$_GET['postid'];
    require_once 'dbconnect.php';
    $link=mysqli_connect($host,$user,$pas,$database);
    $query="DELETE FROM post WHERE id='$id'";
    mysqli_query($link,$query);
    header('Location: '. '/index.php');
?>