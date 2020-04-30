<?php
        require_once 'dbconnect.php';
        $link=mysqli_connect($host,$user,$pas,$database) or die ("Error" . mysqli_error($link));
        $query="SELECT * FROM (SELECT * FROM post ORDER BY id DESC LIMIT 10) post ORDER BY id DESC";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
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
                echo '<div class="file">
                <div class="title t2"><a href="postpage.php/?postid=';echo $postid; echo'">';echo $posttitle; echo '</a></div>
                <div class="createdby">Добавил '; echo $postnick; echo'</div>
                <div class="datetime">';echo $postdatetime ;echo'</div>
                <div class="filescount" > Количество файлов:';echo count($postfiles) ;echo'</div>
            </div>';
            }
        }
        mysqli_close($link);
    ?>