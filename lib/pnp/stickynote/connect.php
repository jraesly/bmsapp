<?php

$link = mysql_connect($db_host,$db_user,$db_password) or die('Unable to establish a DB connection');

mysql_select_db($db_name,$link);
mysql_query("SET names UTF8");

?>