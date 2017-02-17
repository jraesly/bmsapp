<?php
require 'boot.php';
Acl::isAllowed('sent-email-logs.php');
$self='system-logs'. EXT;
require ('../lib/paginator.sysfrm.php');
$paginate = _paginate('email_logs');
$startpoint= $paginate['startpoint'];
$limit= $paginate['limit'];
$fpage=$paginate['page'];
$lpage=$paginate['lastpage'];
$tfound=$paginate['found'];
$query = "SELECT id,email,subject,date from email_logs ORDER BY id DESC LIMIT
{$startpoint} , {$limit}";
require ("views/$gat/sent-email-logs.tpl.php");