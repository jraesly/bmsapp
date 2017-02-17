<?php
require "boot.b4login.php";
$trid = _get('_cmd');
 $trd= ORM::for_table('products')->find_one($trid);
require ("views/$gTheme/view-details.tpl.php");