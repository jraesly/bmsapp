<?php
require 'boot.php';
$cmd = _get('_xClick');
$d = ORM::for_table('orders')->find_one($cmd);
$userid = $d['userid'];
if ($userid != $cid){
	$self = 'my-orders'.EXT;
 r2($self,'e','You are not allowed to view this order');
}
$ordernum = $d['ordernum'];
$userid = $d['userid'];
$pid = $d ['pid'];
$pname = $d['pname'];
$invoiceid = $d['invoiceid'];
$date = $d['date'];
$amount = $d['amount'];
$invoiceid = $d['invoiceid'];
$notes = $d['notes'];
$status = $d['status'];
if ($status=='Active'){
   $sttxt = "<span class=\"label label-success\">$status</span>" ;
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

require ("views/$gTheme/view.tpl.php");