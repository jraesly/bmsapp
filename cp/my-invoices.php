<?php
require 'boot.php';
$self='my-invoices'. EXT;
$dc = lc('defaultcurrency');
require ('../lib/paginator.sysfrm.php');
$adWhere=  "where userid='$cid'";
$paginate = _paginate('invoices',$adWhere);
$startpoint= $paginate['startpoint'];
$limit= $paginate['limit'];
$fpage=$paginate['page'];
$lpage=$paginate['lastpage'];
$tfound=$paginate['found'];
$query = "SELECT * from invoices $adWhere ORDER BY id DESC LIMIT
{$startpoint} , {$limit}";
require ("views/$gTheme/my-invoices.tpl.php");