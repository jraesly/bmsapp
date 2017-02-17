<?php
require 'boot.php';
Acl::isAllowed('enquiries.php');
require ('../lib/paginator.sysfrm.php');
$paginate = _paginate('enquiries');
$startpoint= $paginate['startpoint'];
$limit= $paginate['limit'];
$fpage=$paginate['page'];
$lpage=$paginate['lastpage'];
$tfound=$paginate['found'];
$query = "SELECT id,email,subject,date from enquiries ORDER BY id DESC LIMIT
{$startpoint} , {$limit}";
require ("views/$gat/enquiries.tpl.php");