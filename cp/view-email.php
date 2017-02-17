<?php
require 'boot.php';
$cmd = _get('_xClick');
$d = ORM::for_table('email_logs')->find_one($cmd);
$ecid = $d['userid'];
if ($cid!=$ecid) {
r2('my-emails.php','e','Sorry, You do not have permissions to view this email');	
}
$sdate = $d['date'];


$idate=strtotime($date);
$date=date($sys_date,$idate);

$subj = $d['subject'];
$msg = $d['message'];
require ("views/$gTheme/view-email.tpl.php");