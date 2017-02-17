<?php
require 'boot.php';
$self='client-profile'. EXT;
$accid=_get('__account');
$acc=findOne('coa',$accid);
require ("views/$gat/accounts.tpl.php");