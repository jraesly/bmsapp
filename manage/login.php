<?php
session_start();
define("_APP_RUN", true);
require "../AppINIT.php";
$self='login'. EXT;
if (isset($_POST['login']))
{
    prf();
    $username=_post('username');
    $password=_post('password');
    if($username==''){
        r2('login'.EXT,'e','Please Enter Your Username');
    }

    if($password==''){
        r2('login'.EXT,'e','Please Enter Your Password');
    }
    $password = md5($secret . $password);

    require ('../lib/admin.class.php');
    $admin_login= new Admins;
    $login=$admin_login->login($username,$password);
}

else {
    $gat=  lc('admintheme');
    require ("views/$gat/login.tpl.php");
}