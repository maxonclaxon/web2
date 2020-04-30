<?php
        require_once 'dbconnect.php';
        $adm=false;
        $link=mysqli_connect($host,$user,$pas,$database) or die ("Error" . mysqli_error($link));
        $query="SELECT * FROM (SELECT * FROM post ORDER BY id DESC LIMIT 10) post ORDER BY id DESC";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
        if($_SESSION){
            if($_SESSION['admin']){
                $nick=$_SESSION['logged_user'];
                $query="SELECT Access FROM profile WHERE Nickname='$nick'";
                $access=mysqli_query($link,$query);
                $access=mysqli_num_rows($access);
                if($access==$_SESSION['admin']){
                    $adm=true;
                    
                }
            }
        }
        if($result)
        {
            $rows = mysqli_num_rows($result);
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                $row = mysqli_fetch_row($result);
                $postid=$row[0];
                $postnick=$row[1];
                $posttitle=$row[2];
                $postdatetime=$row[3];
                $postmessage=$row[4];
                $postfiles=$row[5];
                $postfiles=explode(";",$row[6]);
                $count=count($postfiles);
                if($postfiles[0]=="") $count=0;

                echo '<div class="file">
                <div class="title t2"><a href="postpage.php/?postid=';echo $postid; echo'">';echo $posttitle; echo '</a></div>
                <div class="createdby">Добавил '; echo $postnick; echo'</div>
                <div class="datetime">';echo $postdatetime ;echo'</div>
                <div class="filescount" > Количество файлов:';echo $count ;
                
                if($adm){
                    echo '
                    <a href="deletepost.php/?postid='; echo $postid; echo'"><button>Удалить пост</button></a>
                    ';
                }
                echo'</div>
                
            </div>';
                
            }
        }
        mysqli_close($link);
    ?>