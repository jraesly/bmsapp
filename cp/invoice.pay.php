<?php
require 'boot.php';
if (isset($_GET['_token'])){
require 'boot.b4login.php';	
$token = _get('_token');
$iid = _get('_cmd');
$invoice = findOne('invoices',$iid);
if($invoice==''){
	r2('home.php','e','Invalid Invoice ID');
}
$vtoken = $invoice['vtoken'];
if ($token!=$vtoken){
    	r2('home.php','e','Invalid Invoice Token');
}
$cid=$invoice['userid'];
}
else {
require 'boot.php';
$iid = _get('_cmd');
$invoice = findOne('invoices',$iid);
if($invoice==''){
	r2('home'.EXT,'e','Invalid Invoice ID');
}
$icid=$invoice['userid'];
if ($icid!=$cid) {exit;}	
}
if (!$pmethod==''){
	$pmethod=str_replace(".", "", $pmethod);
	$amount = $trd['price'];
	$item = $trd['name'];
	$currency_code = lc('defaultcurrency');
	$d = ORM::for_table('invoices')->create();
	$d->userid = $cid;
	$d->created = date('Y-m-d');
	$d->duedate = date('Y-m-d');
	$d->subtotal = $amount;
	$d->total = $amount;
     $d->vtoken = _raid('10');
    $d->ptoken = _raid ('10');
	$d->status = 'Unpaid';
	$d->paymentmethod = $pmethod;
	$d->save();
	$invoiceid= $d->id();
	$d = ORM::for_table('invoiceitems')->create();
	$d->invoiceid = $invoiceid;
	$d->userid = $cid;
	$d->description = $item;
	$d->amount = $amount;
	$d->save();
	$ip=$_SERVER['REMOTE_ADDR'];
	$d = ORM::for_table('orders')->create();
	$d->ordernum = _raid('10') ;
	$d->userid = $cid;
	$d->pid = $trid;
	$d->pname = $item;
	$d->date = date('Y-m-d H:i:s');
	$d->amount = $amount;
	$d->paymentmethod = $pmethod;
	$d->invoiceid = $invoiceid;
	$d->status = 'Pending';
	$d->ipaddress = $ip;
	$d->save();
	//
	
	$processFile = "../lib/pnp/$pmethod/processor.php";

if (file_exists($processFile)) {
    require($processFile);
	return;
} else {
   r2('home.php','e','The Payment Processor Not Found');
}