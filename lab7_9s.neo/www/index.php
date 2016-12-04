<html>
<head>
    <title>Лаба №7</title>
    <link rel="stylesheet" href="1.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <script>
        function myclock(){
            var tim = document.getElementById('clock');
            ndata=new Date();
            hours= ndata.getHours();
            mins= ndata.getMinutes();
            secs= ndata.getSeconds();
            if (hours < 10) {hours = "0" + hours }
            if (mins < 10) {mins = "0" + mins }
            if (secs < 10) {secs = "0" + secs }
            datastr =hours+":" + mins+":" +secs
            tim.setAttribute("value", datastr);
            setTimeout("myclock()", 1000);
        };
    </script>
</head>
<body onLoad="myclock()">
<div class="layoutM">
    <h1>Лабораторная работа №7</h1>
    <h2>"Работа с базой данных."</h2>
    <center>
        <?php

        $n_db = "lab7";
        @mysql_connect("localhost", "root") or die("<br>Could not connect to MySQL server!");
        @mysql_select_db($n_db) or die("<br>Could not select $n_db database!");

        $query = "select id, nameS, colv from imgf order by colv desc";
        $result = @mysql_query($query);
        $x = 0;
        $kol_rows = @mysql_num_rows($result);

        for ($x; $x < $kol_rows; $x++){
            $src = @mysql_result($result, $x, 'nameS');
            $num = @mysql_result($result, $x, 'id');
            $colv = @mysql_result($result, $x, 'colv');

            print "<form method=\"post\" action=\"photo.php\" >";
            print "<img class='img' title='Колчиество просмотров: $colv' src='$src'><br>";
            print "<input type=\"submit\" value=\"Просмотреть\">";
            print "<Input type=\"TextField\" class='numb' name=\"number\" value=\"$num\">";
            print "</form>";

        }

        ?>
<!--        <br>-->
<!--        <form method="post" action="" enctype="multipart/form-data">-->
<!--            <p class="content">Форма для добавления картинки<br><br>-->
<!--                <input type="file" name="filename"><br><br>-->
<!--                <input type="submit" value="Загрузить"><br>-->
<!--                --><?php
//
//
//
//                $file_name = $_FILES['filename']['name'];
//                $file_type = $_FILES['filename']['type'];
//                if ($file_name==""){
//                }
//                else{
//                    $file_type = $_FILES['filename']['type'];
//                    if (($file_type != "image/jpg") && ($file_type != "image/jpeg")){
//                        print "<p class='error'>??????????? ????? ?????? ? ???????????? .jpg, .png, .gif!!!!!!</p>";
//                    }
//                    else {
//                        $uploaddirbig = 'work/big/';
//                        $uploaddirsm = 'work/small/';
//                        $uploadfile = $uploaddirbig . basename($file_name);
//                        $uploadfilesm = $uploaddirsm . basename($file_name);
//                        move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile);
//
//                        $imagSM = $uploadfile;
//                        $width = 225;
//                        $height = 140;
//                        $image_p = imagecreatetruecolor($width, $height);
//                        $image = imagecreatefromjpeg($imagSM);
//                        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, imagesx($image), imagesy($image));
//                        imagejpeg($image_p, $uploadfilesm, 75);
//                        imagedestroy($image_p);
//                    }
//                }
//                ?>
            </p>
        </form>

    </center>
    <div>
        <input type="text" id="clock">
    </div>
    <div>
        <p class="lastInf">Нелюбин Е.О.<br>
            гр. 220602<br><a href="http://www.bsuir.by/" id="ss" target="_blank">БГУИР</a><span class="super">C</span><br>Минск 2016</p>
    </div>
</div>
</body>
</html>