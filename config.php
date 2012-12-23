<?php
date_default_timezone_set("Europe/Zurich");
$connect = mysql_connect('localhost',
        'projet',
        'MXCwUzTumrBxwPTx') or die(mysql_error());
//mysql_query("SET NAME 'utf8'");
//$connect = mysql_connect('localhost','root','33FH-26A-4FF') or die(mysql_error());
mysql_select_db('projet') or die(mysql_error());
?>
