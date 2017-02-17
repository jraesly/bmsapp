<?php
require 'boot.php';
$self='order'. EXT;
$cmd = _get('_show');
$d = ORM::for_table('orders')->find_one($cmd);
$ordernum = $d['ordernum'];
$userid = $d['userid'];
$pid = $d ['pid'];
$pname = $d['pname'];
$invoiceid = $d['invoiceid'];
$date = $d['date'];
$amount = $d['amount'];
$invoiceid = $d['invoiceid'];
$status = $d['status'];
$notes = $d['notes'];
if ($status=='Active'){
   $sttxt = "<span class=\"label label-success\">Completed</span>" ;
}
elseif ($status=='Pending'){
    $sttxt = "<span class=\"label label-important\">$status</span>" ; 
}
elseif ($status=='Processing'){
     $sttxt = "<span class=\"label label-warning\">$status</span>" ;
}
elseif ($status=='Fraud'){
     $sttxt = "<span class=\"label\">$status</span>" ;
}
else {
    $sttxt = "<span class=\"label\">$status</span>" ;
}
$ipaddress = $d['ipaddress'];
//get user
$u = ORM::for_table('accounts')->find_one($userid);
$clname = $u['name'];
//
require ("views/$gat/order.tpl.php");