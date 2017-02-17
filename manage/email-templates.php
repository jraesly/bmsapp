<?php
require 'boot.php';
Acl::isAllowed('email-templates.php');
$self='system-logs'. EXT;
require ('../lib/paginator.sysfrm.php');
$paginate = _paginate('email_templates');
$startpoint= $paginate['startpoint'];
$limit= $paginate['limit'];
$fpage=$paginate['page'];
$lpage=$paginate['lastpage'];
$tfound=$paginate['found'];
$query = "SELECT id,tplname,subject from email_templates ORDER BY id DESC LIMIT
{$startpoint} , {$limit}";
require ("views/$gat/email-templates.tpl.php");