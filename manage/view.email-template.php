<?php
require 'boot.php';
$self='view.email-template.php';
$cmd = _get('_xClick');
if (isset($_POST['act'])&&$_POST['act']=='edit'){
    $cmd = _post('id');
    if ($xstage=='Demo'){
r2($self.'?_xClick='.$cmd,'e','Updating Email Template is disabled in the Demo Mode');
}
$send = _post('send');
$d = ORM::for_table('email_templates')->find_one($cmd);
$d->subject= _post('subject');
$d->message = $_POST['message'];
if ($send=='1'){
$d->send = '1';	
}
else {
	$d->send = '0';	
}
$d->save();
r2($self.'?_xClick='.$cmd,'s','Email Template Updated Successfully');
}
$d = ORM::for_table('email_templates')->find_one($cmd);
require ("views/$gat/view.email-template.tpl.php");