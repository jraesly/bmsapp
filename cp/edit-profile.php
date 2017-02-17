<?php
require 'boot.php';
$self = 'edit-profile'.EXT;
if (isset($_POST['submit'])){
if ($xstage=='Demo'){
r2('edit-profile.php','e','Editing Profile is disabled in the demo mode');
}    
$cl= findOne('accounts',$cid);
$oldpassword= $cl['password'];
if ($cl==false) r2('manage-clients'. EXT);
$name = _post('name');
$company = _post('company');
$email = $cl['email'];
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
    $status='Active';
require ('../lib/clients.class.php');
$updatecl = new Clients;
$update = $updatecl->Update($name, $company, $email, $address1, $address2, $city, $state, $postcode, $country, $phone,$status,$password, $group = '0', $cid);

if ($update){
    _log('client',"Account Information Updated By Client, Client ID: $cid",$cid);
    r2($self,'s','Account Infromation Updated Successfully');
}   
}
require ("views/$gTheme/edit-profile.tpl.php");