<?php
require 'boot.php';
if (isset($_POST['act'])&&($_POST['act']=='edit')){
$cmd = _post('cmd');
$d = ORM::for_table('invoices')->find_one($cmd);
$tax = $d['tax'];
$cid = $d['userid'];
$amount = $_POST['amount'];


    $sTotal='0';
    $i = '0';
    foreach ($amount as $samount){
        $amount[$i]= $samount;
        $sTotal += $samount;
        $i++;
    }  
    $taxval = '0.00';
    $taxname = '';
    $fTotal = $sTotal;
if ($tax!='0.00'){
$dt = ORM::for_table('taxes')->find_one(1);
$taxrate = $dt['rate'];
$taxname = $dt['name'];
$taxtype = $dt['type'];
if ($taxtype=='Excluded'){
    $taxval = ($sTotal*$taxrate)/100;
    $fTotal = $fTotal+$taxval;
    
}
else {
    $taxval = ($sTotal*$taxrate)/100;
    $sTotal = $fTotal-$taxval; 
}
//update the tax val in database
//$d = ORM::for_table('accounts')->find_one(101);
//$d->balance = $d['balance']+$taxval;
//$d->save();
}
$notes = $_POST['notes'];
    $d->subtotal = $sTotal;
	$d->total = $fTotal;
    $d->tax = $taxval;
    $d->taxname = $taxname;
	$d->notes = $notes;
    $d->save(); 
    //delete all exisiting invoice item and re create
    $items = ORM::for_table('invoiceitems')
    ->where_equal('invoiceid', $cmd)
    ->delete_many();
    $description = $_POST['description'];
	
    $i='0';
    foreach ($description as $item){
       $d = ORM::for_table('invoiceitems')->create();
	$d->invoiceid = $cmd;
	$d->userid = $cid;
	$d->description = $item;
	$d->amount = $amount[$i];
	$d->save();
    $i++;
    } 
    
	
    r2("invoice.php?_show=$cmd",'s','Invoice Edited Successfully');
}
$iid = _get('_edit');
$invoice = findOne('invoices',$iid);
if($invoice==''){
	r2('invoices.php','e','Invalid Invoice ID');
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

$cl=findOne('accounts',$cid);
$defaultcurrencysymbol= lc('defaultcurrencysymbol');
require ("views/$gat/edit.invoice.tpl.php");