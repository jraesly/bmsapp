<?php
require 'boot.php';
$rid = _get('_delete');
$invoice = findOne('invoices',$rid);
if($invoice==''){
	r2('invoices.php','e','Invalid Invoice ID');
}
$cmd = ORM::for_table('invoices')->find_one($rid);
    $cmd->delete();
$cmd = ORM::for_table('invoiceitems')
    ->where_equal('invoiceid', $rid)
    ->delete_many();
r2('invoices.php','s',"Invoice- $rid deleted Successfully");
/*
ALTER TABLE `invoices`
auto_increment = 1000
*/