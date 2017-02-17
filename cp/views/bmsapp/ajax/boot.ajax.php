<?php
session_start();
define("_APP_RUN", true);
require '../../../../AppINIT.php';
_authenticate();
$slid = $_SESSION['lid'];
$ulid = $_COOKIE["_lid"];
if ($slid != $ulid) {
    r2('../../../../login'.EXT,'e','Invalid Token Please Login Again');
}
$cid=$_SESSION['cid'];
$gTheme=  lc('theme');