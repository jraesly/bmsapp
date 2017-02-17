<?php
session_start();
define("_APP_RUN", true);
require '../AppINIT.php';
require ('../lib/admin.init.php');
require ('../lib/Acl.php');
_isadmin();
$slid = $_SESSION['lid'];
$ulid = $_COOKIE["_lid"];
if ($slid != $ulid) {
    r2('login.php','e','Invalid Token Please Login Again');
}
$aid=$_SESSION['aid'];
$gat=  lc('admintheme');
$xbrand = lc('BrandName');
