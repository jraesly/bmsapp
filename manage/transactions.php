<?php
require 'boot.php';
$self='transactions.php';
Acl::isAllowed($self);
$dc = lc('defaultcurrency');
require ('../lib/paginator.sysfrm.php');
$filter=_get('_filter');

if($filter=='' OR $filter=='_blank'){
  $adWhere=  '';
}
else {
    $adWhere=  "WHERE (ttype='$filter')";
}

$paginate = _paginate('transactions',$adWhere);
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
$query = "SELECT * from transactions $adWhere ORDER BY id DESC LIMIT
{$startpoint} , {$limit}";

require ("views/$gat/transactions.tpl.php");