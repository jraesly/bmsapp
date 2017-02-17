<?php
require 'boot.php';
Acl::isAllowed('expense.php');
$self='manage-accounts'. EXT;
require ("views/$gat/expense.tpl.php");