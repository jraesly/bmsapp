<?php
require 'boot.php';
$self='invoice-recurring.php';
Acl::isAllowed($self);
require ("views/$gat/invoice-recurring.tpl.php");