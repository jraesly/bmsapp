<?php
require 'boot.php';
$self='account-profile'. EXT;
$cid=_get('__account');
$cl=findOne('accounts',$cid);
require ("views/$gat/account-profile.tpl.php");