<?php
require 'boot.php';
Acl::isAllowed('notice-board.php');
$self='message-board'. EXT;
require ("views/$gat/notice-board.tpl.php");