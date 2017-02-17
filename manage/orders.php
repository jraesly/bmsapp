<?php
require 'boot.php';
$self='orders.php';
Acl::isAllowed($self);
require ('../lib/paginator.sysfrm.php');
$filter=_get('_filter');
if($filter=='' OR $filter=='_blank'){
  $adWhere=  '';
}
else {

    $adWhere=  "WHERE (orders.status='$filter')";
}

$paginate = _paginate('orders',$adWhere);
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
$query = "SELECT orders.id, accounts.name, orders.invoiceid, orders.ordernum, orders.pid, orders.date, orders.amount FROM orders INNER JOIN accounts ON orders.userid = accounts.id $adWhere ORDER BY orders.id DESC LIMIT
{$startpoint} , {$limit}";
require ("views/$gat/orders.tpl.php");