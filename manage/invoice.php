<?php
require 'boot.php';
$iid = _get('_show');
$invoice = findOne('invoices',$iid);
if($invoice==''){
	r2('invoices'.EXT,'e','Invalid Invoice ID or Invoice has been deleted');
}
$cid=$invoice['userid'];
$created = $invoice['created'];
$duedate = $invoice['duedate'];
$datepaid= $invoice['datepaid'];
$paymentmethod= $invoice['paymentmethod'];
$note = $invoice['notes'];
$total = $invoice['total'];
$stotal = $invoice['subtotal'];
$tax = $invoice['tax'];
$taxname = $invoice['taxname'];
$vtoken = $invoice ['vtoken'];
$caddress =lc('caddress');
$status = $invoice['status'];
$stbtn = 'Mark Cancelled';
$stact = 'cancel';
$stbtn2 = 'Mark Paid';
    $stact2 = 'paid';
if ($status=='Unpaid'){
    $cls = 'unpaid';
    
}
elseif ($status=='Paid'){
    $cls = 'paid';
    $stbtn2 = 'Mark Unpaid';
    $stact2 = 'unpaid';
}
elseif ($status=='Partially Paid'){
    $cls = 'partiallypaid';
}
elseif ($status=='Cancelled'){
    $cls = 'cancelled';
    $stbtn = 'Mark Unpaid';
    $stact = 'unpaid';
}
else {
    $cls = 'draft';
}

$cdate = strtotime($created);
$created = date($sys_date, $cdate);

$ddate = strtotime($duedate);
$duedate = date($sys_date, $ddate);

$pdate = strtotime($datepaid);
$datepaid = date($sys_date, $pdate);

$cl=findOne('accounts',$cid);
$defaultcurrencysymbol= lc('defaultcurrencysymbol');
require ("views/$gat/invoice.tpl.php");