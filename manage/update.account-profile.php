<?php
require 'boot.php';
require '../lib/validator.class.php';
$cid= _get('__account');
$cl= findOne('accounts',$cid);
$oldpassword= $cl['password'];
$ocountry = $cl['country'];
if ($cl==false) r2('manage-accounts'. EXT);
if ($xstage=='Demo'){
r2('account-profile'.EXT.'?__account='.$cid.'#account.edit/'.$cid,'e','Editing Account Profile is disabled in the demo mode');
}
$name = _post('name');
$company = _post('company');
$email = _post('email');
//
$cltype = $cl['acctype'];
if ($cltype=='Customer') {
	if (!is_valid::Email($email)) {
       
		r2('account-profile'.EXT.'?__account='.$cid.'#account.edit/'.$cid,'e','Please Enter a valid Email Address');
		}
}

//
$password = _post('password');
$postcode = _post('postcode');
if ($password=='--Click To Edit--'){
     $password = $oldpassword;
}
else {
    $password = md5($secret.$password);
}
    $address1 = _post('address1');
    $address2 = _post('address2');
    $city = _post('city');
    $state = _post('state');
    $country = _post('country');
    $phone = _post('phone');
    $status = _post('status');
	$group = _post('gid');
require ('../lib/clients.class.php');
$updatecl = new Clients;
$update = $updatecl->Update($name,$company,$email,$address1,$address2,$city,$state,$postcode,$country,$phone,$status,$password,$group,$cid);

if ($update){
    _log('admin',"Account Information Updated By Admin ($aid), Client ID: $cid",$aid);
    r2('account-profile'.EXT.'?__account='.$cid.'#account.edit/'.$cid,'s','Account Infromation Updated Successfully');
}
r2('account-profile'.EXT.'?__account='.$cid.'#account.edit/'.$cid,'e','An Error Occured');


