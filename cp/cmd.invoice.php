<?php
require 'boot.php';
//
$iid = _get('_xClick');
$invoice = findOne('invoices',$iid);
if($invoice==''){
	r2('my-invoices'.EXT,'e','Invalid Invoice ID');
}
$icid=$invoice['userid'];
if ($icid!=$cid) {exit;}
$created = $invoice['created'];
$duedate = $invoice['duedate'];
$datepaid= $invoice['datepaid'];
$paymentmethod= $invoice['paymentmethod'];
$note = $invoice['notes'];
$total = $invoice['total'];

//
$amount=$total;
$item = 'Invoice Payment-'.$iid;
$item_id = $cid;

$pmethod='paypal';
if (!$pmethod==''){
	$pmethod=str_replace(".", "", $pmethod);
	$processFile = "../lib/pnp/$pmethod/processor.php";

if (file_exists($processFile)) {
    require($processFile);
	return;
} else {
   r2('add-fund','e','The Payment Processor Not Found');
}
	
}
