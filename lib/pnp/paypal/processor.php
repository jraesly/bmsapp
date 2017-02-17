<?php
if (!defined("_APP_RUN"))
die('Direct access to this location is not allowed.');
//
$d= ORM::for_table('paymentgateways')->where('name', 'Paypal')->find_one();
$ppemail = $d['value'];
//
$currency_code = lc('defaultcurrency');

if (!isset($item)){
   $item = _post('item'); 
}
if (!isset($item_id)){
  $item_id = _post('trid');  
}

if (!isset($amount)){
$amount = _post('amount');
}
if (!isset($invoiceid)){
    $invoiceid = 'M-CID'.$cid;
}
$sysUrl= lc('sysUrl');
require('paypal.class.php');
$paypal = new Paypal;
$paypal->param('business', $ppemail);
$paypal->param('return', $sysUrl.'/cp/listener.system.php?_cmd=TrID');
$paypal->param('cancel_return', $sysUrl.'/cp/listener.system.php?_cmd=0');
$paypal->param('notify_url', $sysUrl.'/cp/listener.system.php?_cmd=listener');
$paypal->param('item_name_1', $item);
$paypal->param('amount_1', $amount);
$paypal->param('item_number_1', $invoiceid);
$paypal->param('quantity_1', '1');
$paypal->param('upload', 1);
$paypal->param('cmd', '_cart');
$paypal->param('txn_type', 'cart');
$paypal->param('num_cart_items', 1);
$paypal->param('payment_gross', $amount);
$paypal->param('currency_code', $currency_code);
$paypal->gw_submit();
