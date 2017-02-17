<?php
require 'boot.php';
$self='my-tickets'. EXT;
require ('../lib/paginator.sysfrm.php');
$adWhere=  "where userid='$cid'";
$paginate = _paginate('tickets',$adWhere);
$startpoint= $paginate['startpoint'];
$limit= $paginate['limit'];
$fpage=$paginate['page'];
$lpage=$paginate['lastpage'];
$tfound=$paginate['found'];
$query = "SELECT id,replyby,userid,name,date,subject,cread,status from tickets $adWhere ORDER BY id DESC LIMIT
{$startpoint} , {$limit}";
require ("views/$gTheme/my-tickets.tpl.php");