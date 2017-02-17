<?php
require 'boot.php';
$self='my-transactions'. EXT;
$dc = lc('defaultcurrency');
require ('../lib/paginator.sysfrm.php');
$adWhere=  "where (tfrom=$cid OR tto=$cid)";
$paginate = _paginate('transactions',$adWhere);
$startpoint= $paginate['startpoint'];
$limit= $paginate['limit'];
$fpage=$paginate['page'];
$lpage=$paginate['lastpage'];
$tfound=$paginate['found'];
$query = "SELECT id,tfromacc,ttoacc,amount,date,memo,status from transactions $adWhere ORDER BY id DESC LIMIT
{$startpoint} , {$limit}";
require ("views/$gTheme/my-transactions.tpl.php");