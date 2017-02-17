<?php
require 'boot.php';
Acl::isAllowed('system-logs.php');
$self='system-logs'. EXT;
require ('../lib/paginator.sysfrm.php');
$paginate = _paginate('logs');
$startpoint= $paginate['startpoint'];
$limit= $paginate['limit'];
$fpage=$paginate['page'];
$lpage=$paginate['lastpage'];
$tfound=$paginate['found'];
$query = "SELECT * from logs ORDER BY id DESC LIMIT
{$startpoint} , {$limit}";
require ("views/$gat/system-logs.tpl.php");