<?php
require 'boot.php';
Acl::isAllowed('balance-sheet.php');
$self='home'. EXT;
require ("views/$gat/balance-sheet.tpl.php");