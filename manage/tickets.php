<?php
require 'boot.php';
Acl::isAllowed('tickets.php');
$self='home'. EXT;
require ('../lib/paginator.sysfrm.php');
$filter=_get('_filter');
if($filter=='' OR $filter=='_blank'){
  $adWhere=  '';

  $items = ORM::for_table('tickets')->select_many('id', 'userid', 'name', 'date', 'subject', 'aread')->order_by_desc('id')->find_many();
}
elseif($filter=='Active') {
$items = ORM::for_table('tickets')->select_many('id', 'userid', 'name', 'date', 'subject', 'aread')->where_not_equal('status', 'Closed')->order_by_desc('id')->find_many();
    $adWhere=  "WHERE (status!='Closed')";
}
elseif($filter=='CustomerReplied') {
$items = ORM::for_table('tickets')->select_many('id', 'userid', 'name', 'date', 'subject', 'aread')->where('status', 'Customer Reply')->order_by_desc('id')->find_many();
    $adWhere=  "WHERE (status='Customer Reply')";
}
elseif($filter=='Answered') {
$items = ORM::for_table('tickets')->select_many('id', 'userid', 'name', 'date', 'subject', 'aread')->where('status', 'Answered')->order_by_desc('id')->find_many();
    $adWhere=  "WHERE (status='Answered')";
}
elseif($filter=='Closed') {
$items = ORM::for_table('tickets')->select_many('id', 'userid', 'name', 'date', 'subject', 'aread')->where('status', 'Closed')->order_by_desc('id')->find_many();
    $adWhere=  "WHERE (status='Closed')";
}
else {
	
}


$paginate = _paginate('tickets',$adWhere);
$startpoint= $paginate['startpoint'];
$limit= $paginate['limit'];
$fpage=$paginate['page'];
$lpage=$paginate['lastpage'];
$tfound=$paginate['found'];
require ("views/$gat/tickets.tpl.php");