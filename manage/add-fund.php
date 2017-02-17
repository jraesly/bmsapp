<?php
require 'boot.php';
$id= _get('_cmd');

$addbalance=_post('addfund');

$clquery=ORM::for_table('accounts')->find_one($id);

$prebalance=$clquery['balance'];

$balance=$prebalance+$addbalance;


$clquery->balance=$balance;
$clquery->save();

r2('account-profile'.EXT.'?__account='.$id.'#account.profile/'.$id,'s','Funds Add Successfully.');


