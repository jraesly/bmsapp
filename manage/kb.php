<?php
require 'boot.php';
Acl::isAllowed('kb.php');
$self='kb'. EXT;
if (isset($_POST['action'])&&$_POST['action']=='edit'){
$catname = _post('catname');
if ($catname==''){
r2($self,'e','Category Name was empty');
}
$id = _post('id');
 $grp = ORM::for_table('knowledgebasecats')->find_one($id);
$grp->set('name', $catname);
$grp->save(); 
  r2($self,'s','Category edited successfully');
}
elseif (isset($_POST['action'])&&$_POST['action']=='delete'){
   $rid = _post('id');
$cmd = ORM::for_table('knowledgebasecats')->find_one($rid);
    $cmd->delete();
$cmd = ORM::for_table('knowledgebase')
    ->where_equal('catid', $rid)
    ->delete_many();
r2($self,'s','Category deleted successfully');    
    
}
elseif (isset($_POST['action'])&&$_POST['action']=='add'){
   $catname = _post('catname'); 
   if ($catname==''){
r2($self,'e','Category Name was empty');
}

$grp = ORM::for_table('knowledgebasecats')->create();
$grp->name=$catname;
$grp->save();  
 r2($self,'s','Category Added successfully');  
    }
else {
  require ("views/$gat/kb.tpl.php"); 
}