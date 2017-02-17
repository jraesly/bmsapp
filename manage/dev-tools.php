<?php
require 'boot.php';
Acl::isAllowed('dev-tools.php');
$self='home'. EXT;
require ("views/$gat/dev-tools.tpl.php");