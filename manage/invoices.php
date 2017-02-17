<?php
require 'boot.php';
$self='invoices.php';
Acl::isAllowed($self);
$dc = lc('defaultcurrency');

require ('../lib/paginator.sysfrm.php');
$filter=_get('_filter');
if($filter=='' OR $filter=='_blank'){
  $adWhere=  '';
}
else {

    $adWhere=  "WHERE (invoices.status='$filter')";
}

$paginate = _paginate('invoices',$adWhere);
$startpoint= $paginate['startpoint'];
$limit= $paginate['limit'];
$fpage=$paginate['page'];
$lpage=$paginate['lastpage'];
$tfound=$paginate['found'];
// join - SELECT * FROM TableA INNER JOIN TableB ON TableA.name = TableB.name
/*
$query = "SELECT id, userid, created, duedate, total from invoices $adWhere ORDER BY id DESC LIMIT
{$startpoint} , {$limit}";
*/
$query = "SELECT invoices.id, accounts.name, invoices.created, invoices.duedate, invoices.total, invoices.status FROM invoices INNER JOIN accounts ON invoices.userid = accounts.id $adWhere ORDER BY invoices.id DESC LIMIT
{$startpoint} , {$limit}";
require ("views/$gat/invoices.tpl.php");