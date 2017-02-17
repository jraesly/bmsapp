<?php
require 'boot.php';
$self='my-tickets'. EXT;
require ('../lib/paginator.sysfrm.php');
$adWhere=  "where userid='$cid'";
$paginate = _paginate('email_logs',$adWhere);
$startpoint= $paginate['startpoint'];
$limit= $paginate['limit'];
$fpage=$paginate['page'];
$lpage=$paginate['lastpage'];
$tfound=$paginate['found'];
$query = "SELECT id,date,subject from email_logs $adWhere ORDER BY id DESC LIMIT
{$startpoint} , {$limit}";
require ("views/$gTheme/my-emails.tpl.php");