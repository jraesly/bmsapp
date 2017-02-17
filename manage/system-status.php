<?php
require 'boot.php';
Acl::isAllowed('system-status.php');
require ("views/$gat/system-status.tpl.php");