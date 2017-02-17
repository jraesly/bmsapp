<?php
require 'boot.php';
$self='edit.roles.php';
$cmd = _get('_cmd');
$d = ORM::for_table('adminroles')->find_one($cmd);
$rname = $d['name'];

function isAccess ($cmd,$key) {
            
            $pcheck = ORM::for_table('adminperms')->where('roleid', $cmd)->where('permid', $key)->find_one();
            if (!$pcheck['permid']>0){
                return false;
            }  
            return true;
        }
$act = _post('act');

//edit
if ($act=='edit'){
$rname = _post('rname');
$rid = _post('rid');
if ($rid=='1'){
r2($self."?_cmd=$rid",'e','You can\'t edit this role. This role is used for Super Admin');     
}
if ($rname=='')	{
 r2($self."?_cmd=$rid",'e','Role Name was blank');   
}
$d = ORM::for_table('adminroles')->find_one($rid);
$d->name = $rname;
$d->save();
$perms = $_POST['perms'];
//delete all permission for permid
$d = ORM::for_table('adminperms')->where_equal('roleid', $rid)->delete_many();
foreach ($perms as $perm){
$d = ORM::for_table('adminperms')->create();
$d->roleid = $rid;
$d->permid = $perm;
$d->save();    
}
//success
r2($self."?_cmd=$rid",'s','Role Edited Successfully');
}
require ("views/$gat/edit.roles.tpl.php");