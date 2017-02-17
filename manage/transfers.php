<?php
require 'boot.php';
Acl::isAllowed('transfers.php');
$self='manage-accounts'. EXT;
require ("views/$gat/transfers.tpl.php");