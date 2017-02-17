<?php
require 'boot.php';
if (isset($_POST['amount'])){
	require '../lib/validator.class.php';
$amount=_post('amount');
$item = 'Add Fund-'.$cid;
$item_id = $cid;
if (!is_valid::Number($amount, 10001, 4)) {
r2('add-fund.php','e','Please Enter a Valid Amount. Amount should be between 5 to 10000');
			}
$pmethod=_post('pmethod');
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
}
require ("views/$gTheme/add-fund.tpl.php");