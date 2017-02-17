<?php
require 'boot.php';
if(!$_POST['page']) die("0");
//sleep(2);
$page = $_POST['page'];
$page = str_replace('#','',$page);
//$page = str_replace('.','',$page);
//$page = str_replace(':','.',$page);
$req_params= explode('/',$page);
//exit ($page);
//exit (var_dump($req_params));
$page=$req_params['0'];
//exit ($aid);
if(file_exists('views/bmsapp/ajax/'.$page.'.php'))
require ('views/bmsapp/ajax/'.$page.'.php');

else
    echo 'views/bmsapp/ajax/'.$page.'.php';
?>