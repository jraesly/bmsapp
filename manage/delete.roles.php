<?php
require 'boot.php';
$self='administrator-roles.php';
$cmd = _get('_cmd');
if ($cmd=='1'){
r2($self."?_cmd=$rid",'e','You can\'t edit this role. This role is used for Super Admin');     
}
//delete all permissions for this role
$fperms = ORM::for_table('adminperms')
    ->where_equal('roleid', $cmd)
    ->delete_many();

//
$d = ORM::for_table('adminroles')->find_one($cmd);
$d->delete();
r2($self,'s','Role Deleted Successfully');