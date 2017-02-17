<?php
//config file

if ('config.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Do not load this page directly');
require ('../../../AppConfig.php');
error_reporting(0);
$limit = 10; //entries displayed per page
$badwords = array("fuck","bitch","cunt");  //add more bad words here

$mysql_link = mysql_pconnect($db_host, $db_user, $db_password) 
               or die( "Unable to connect to SQL server"); 
mysql_select_db( "$db_name") or die( "Unable to select database");



//error_reporting(E_ALL ^ E_NOTICE);
