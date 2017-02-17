<?php
session_start();
define("_APP_RUN", true);
require '../AppINIT.php';
$footerTxt = lc ('footerTxt');
$gTheme=  lc('theme');
$cms=findOne('acms','1');
require ("views/$gTheme/index.tpl.php");