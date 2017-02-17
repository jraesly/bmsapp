<?php
require 'boot.b4login.php';
$pmethod = _post('pmethod');
if (!$pmethod==''){
  $iid = _post('iid');
$d = ORM::for_table('invoices')->find_one($iid);
$item = $d['id'];
$amount = $d['total'];
$item_id = 'Invoice Payment';
$invoiceid = $iid;
$processFile = "../lib/pnp/$pmethod/processor.php";
if (file_exists($processFile)) {
    require($processFile);
	return;
} else {
   r2('home.php','e','The Payment Processor Not Found');
}  
    }