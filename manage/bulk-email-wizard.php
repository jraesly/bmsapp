<?php
require 'boot.php';
$self='bulk-email-wizard.php';
Acl::isAllowed($self);
require ("views/$gat/bulk-email-wizard.tpl.php");