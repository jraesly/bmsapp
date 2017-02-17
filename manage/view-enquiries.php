<?php
require 'boot.php';
$self='view-enquiries.php';
$cmd = _get('_xClick');
$d=findOne('enquiries',$cmd);
require ("views/$gat/view-enquiries.tpl.php");