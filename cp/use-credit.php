<?php
require 'boot.php';
$iid = _get('_for_invoice');
$invoice = findOne('invoices',$iid);
if($invoice==''){
	r2('home'.EXT,'e','Invalid Invoice ID');
}
$cl=findOne('accounts',$cid);
$clbalance = $cl['balance'];

$total = $invoice['total'];
$ftxt = '<button type="submit" class="btn btn-inverse" name="submit" rel="tooltip" title="first tooltip">Confirm</button>';	
if ($clbalance<$total){
$ftxt = '<button type="submit" disabled="disabled" class="btn btn-danger" name="submit" rel="tooltip" title="first tooltip">Insufficient Fund</button>';	
}
$nbal = $clbalance-$total;
$act = _post('act');
if ($act=='confirm'){
	$invid = _post('invid');
   if ($clbalance>$total){
	  

	   $cmd = ORM::for_table('accounts')->find_one($cid);
$cmd->balance=$nbal;
    $cmd->save();
	    $cmd = ORM::for_table('invoices')->find_one($invid);
$cmd->status='Paid';
    $cmd->save();
   }
   



   r2('invoice.php?_cmd='.$invid);

	
}
require ("views/$gTheme/use-credit.tpl.php");