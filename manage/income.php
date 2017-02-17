<?php
require 'boot.php';
Acl::isAllowed('income.php');
$self='manage-accounts'. EXT;
require ("views/$gat/income.tpl.php");