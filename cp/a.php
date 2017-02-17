<?php
define("_APP_RUN", true);
require '../AppINIT.php';
$gTheme=  lc('theme');
require ("views/$gTheme/a.tpl.php");