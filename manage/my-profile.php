<?php
require 'boot.php';
$self='my-profile'. EXT;
$act = _post('action');
if($act=='edit'){
if ($xstage=='Demo'){
r2($self,'e','Changing Settings is disabled in the Demo Mode');
}
$id = $aid;
$fname = _post('fname');
$lname = _post('lname');
$email = _post('email');
$password = _post('password');
$signature = $_POST['signature'];
if ($fname=='' OR $lname=='' OR $email=='' OR $password==''){
r2($self,'e','All Fields is Required');
}
$d = ORM::for_table('admins')->find_one($id);
$d->fname = $fname;
$d->lname = $lname;
$d->email = $email;
$d->signature = $signature;
if ($password=='--Click To Edit--'){
    
}
else {
    $password = md5($secret.$password);
    $d->password = $password;
}

$d->save();
 r2($self,'s','Profile Edited Successfully');   
}
require ("views/$gat/my-profile.tpl.php");