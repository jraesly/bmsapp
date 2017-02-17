<?php
require 'boot.php';
Acl::isAllowed('dms.php');
$self='home'. EXT;
require ("views/$gat/dms.tpl.php");