<?php
require 'boot.php';
$self='client-groups.php';
Acl::isAllowed($self);
if (isset($_POST['action'])&&$_POST['action']=='edit'){
$groupname = _post('groupname');
if ($groupname==''){
r2($self,'e','Group Name was empty');
}
$id = _post('id');
 $grp = ORM::for_table('accgroups')->find_one($id);
$grp->set('groupname', $groupname);
$grp->save(); 
  r2($self,'s','Group edited successfully');
}
elseif (isset($_POST['action'])&&$_POST['action']=='delete'){
    $trid = _post('trid');
  $tr = ORM::for_table('accgroups')->find_one($trid);
  if (!$tr){
 r2($self,'e','Group Not Found Or this Group already deleted');
  }
  $cnt = ORM::for_table('accounts')->where('groupid', $trid)->count('id');
  if ($cnt=='0'){
    $tr->delete();
  }
  else {
    r2($self,'e',"Found $cnt Accounts in the Group. Group Can't be Deleted");
  }
// now delete the transaction

r2($self,'s','Group deleted successfully');    
    
}
elseif (isset($_POST['action'])&&$_POST['action']=='add'){
   $groupname = _post('groupname'); 
   if ($groupname==''){
r2($self,'e','Group Name was empty');
}

$grp = ORM::for_table('accgroups')->create();
$grp->groupname=$groupname;
$grp->save();  
 r2($self,'s','Group Added successfully');  
    }
else {
  require ("views/$gat/client-groups.tpl.php");  
}
