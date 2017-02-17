<?php
require 'boot.php';
$cmd = _get('_xClick');
$eml=findOne('email_logs',$cmd);
$sent_to = $eml['email'];
$subject = $eml['subject'];
$dtsent = $eml['date'];
$msgbody = $eml['message'];
require ("views/$gat/view-email.tpl.php");