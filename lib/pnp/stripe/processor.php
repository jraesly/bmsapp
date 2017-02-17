<?php
if (!defined("_APP_RUN"))
die('Direct access to this location is not allowed.');
//
$d= ORM::for_table('paymentgateways')->where('name', 'Stripe')->find_one();
$skey = $d['value'];
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
require ("views/$gTheme/stripe.tpl.php");
exit;
