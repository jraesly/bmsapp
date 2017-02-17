<?php
require 'boot.php';
Acl::isAllowed('administrators.php');
$self='administrators'. EXT;
$act = _post('action');
if ($act=='add'){
$fname = _post('fname');
$lname = _post('lname');
$email = _post('email');
$username = _post('username');
$count = ORM::for_table('admins')->where('username',$username)->count();
if ($count!='0'){
r2($self,'e','An Administrator with same username already exist');
}
$password = _post('password');
if ($fname=='' OR $lname=='' OR $email=='' OR $password==''){
r2($self,'e','All Fields is Required');
}
$password = md5($secret.$password);
$admrole = _post('roleid');
$d = ORM::for_table('admins')->create();
$d->fname = $fname;
$d->lname = $lname;
$d->email = $email;
$d->username = $username;
$d->password = $password;
$d->roleid = $admrole;

$d->save();
r2($self,'s','Administrator Added Successfully');
}
elseif($act=='edit'){
$id = _post('id');
$fname = _post('fname');
$lname = _post('lname');
$email = _post('email');
$password = _post('password');
if ($fname=='' OR $lname=='' OR $email=='' OR $password==''){
r2($self,'e','All Fields is Required');
}
$admrole = _post('roleid');
$d = ORM::for_table('admins')->find_one($id);
$d->fname = $fname;
$d->lname = $lname;
$d->email = $email;
$d->roleid = $admrole;
if ($password=='--Click To Edit--'){
    
}
else {
    $password = md5($secret.$password);
    $d->password = $password;
}

$d->save();
 r2($self,'s','Profile Edited Successfully');   
}
elseif($act=='delete'){
$id = _post('id');
 $d = ORM::for_table('admins')->find_one($id);
 $d->delete();
 r2($self,'s','Account Deleted Successfully');   
}
else {
    
}
require ("views/$gat/administrators.tpl.php");