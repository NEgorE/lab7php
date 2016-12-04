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
    <h2>"Просмотр картинки"</h2>
    <center>
        <?php

        $numder = $_POST['number'];
        $n_db = "lab7";
        @mysql_connect("localhost", "root") or die("<br>Could not connect to MySQL server!");
        @mysql_select_db($n_db) or die("<br>Could not select $n_db database!");

        $queryGetCount = "select colv from imgf where id=$numder";
        $resultGetCount = @mysql_query($queryGetCount);
        $getCount = @mysql_result($resultGetCount, 0, 'colv');
        $getCount++;
        $getCountI = (int)$getCount;


        $querySetCount = "update imgf set colv='$getCount' where id=$numder";
        @mysql_query($querySetCount);

        $query = "select id, nameB, colv from imgf where id=$numder";
        $result = @mysql_query($query);
        $srcF = @mysql_result($result, 0, 'nameB');
        $countF = @mysql_result($result, 0, 'colv');

        print "<img class='viewF' src='$srcF'><br>";
        print "Количество просмотров: $countF"
        ?>


        <a href="index.php"><input type="button" name="gotob" value="Вернуться в галерею"></a>

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