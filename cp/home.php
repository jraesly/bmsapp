<?php
require 'boot.php';
$cl=findOne('accounts',$cid);
require ("views/$gTheme/home.tpl.php");