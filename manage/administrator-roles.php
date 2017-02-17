<?php
require 'boot.php';
Acl::isAllowed('administrator-roles.php');
$self='administrator-roles.php';
$act = _post('action');
if ($act=='add'){
$name = _post('name');
if ($name==''){
r2($self,'e','Role name was blank');
}
$d = ORM::for_table('adminroles')->create();
$d->name = $name;
$d->save();
r2($self,'s','Role Added Successfully');
}
else {
    
}
require ("views/$gat/administrator-roles.tpl.php");