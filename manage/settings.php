<?php
require 'boot.php';
Acl::isAllowed('settings.php');
$self='account-profile'. EXT;
$cid=_get('__account');
$cl=findOne('accounts',$cid);
require ("views/$gat/settings.tpl.php");