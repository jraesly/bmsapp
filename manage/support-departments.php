<?php
require 'boot.php';
Acl::isAllowed('support-departments.php');
$self='support-departments.php';
if (isset($_POST['action'])&&$_POST['action']=='edit'){
$name = _post('name');
if ($name==''){
r2($self,'e','Name was empty');
}
$email = _post('email');
	 require '../lib/validator.class.php';
 if (!is_valid::Email($email)) {
        r2($self,'e','Please Enter a valid Email Address');
		}
		$show = _post('show');
$id = _post('id');
 $grp = ORM::for_table('ticketdepartments')->find_one($id);
$grp->name=$name;
$grp->email = $email;
$grp->show = $show;
$grp->save(); 
  r2($self,'s','Category edited successfully');
}
elseif (isset($_POST['action'])&&$_POST['action']=='delete'){
   $rid = _post('id');
$cmd = ORM::for_table('ticketdepartments')->find_one($rid);
    $cmd->delete();
r2($self,'s','Deleted successfully');    
    
}
elseif (isset($_POST['action'])&&$_POST['action']=='add'){
   $name = _post('name'); 
   if ($name==''){
r2($self,'e','Name was empty');
}
$email = _post('email');
	 require '../lib/validator.class.php';
 if (!is_valid::Email($email)) {
        r2($self,'e','Please Enter a valid Email Address');
		}
		$show = _post('show');
$grp = ORM::for_table('ticketdepartments')->create();
$grp->name=$name;
$grp->email = $email;
$grp->show = $show;
$grp->order = '1';
$grp->save();  
 r2($self,'s','Department Added successfully');  
    }
else {
  require ("views/$gat/support-departments.tpl.php"); 
}