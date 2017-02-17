<?php
require 'boot.php';
Acl::isAllowed('cms.php');
$self='cms.php';
$cms=findOne('acms','1');
$contents = $cms['contents'];
if (isset($_POST['act']) && $_POST['act']=='save'){
	if ($xstage=='Demo'){
r2($self,'e','Changing Settings is disabled in the Demo Mode');
}
	$ncontents = $_POST['contents'];
	//exit ("$ncontents");
	
	$d = ORM::for_table('acms')->find_one('1');
	$d->contents = $ncontents;
	$d->save();

	# v 2.0
	//$d = updateOne ('acms','contents',$ncontents,'1');
	
  
	
	r2($self,'s','Contents Saved Successfully');
	
}
require ("views/$gat/cms.tpl.php");