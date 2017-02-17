<?php
require 'boot.php';
$self='add-new-client.php';
Acl::isAllowed($self);
require ("views/$gat/add-new-client.tpl.php");