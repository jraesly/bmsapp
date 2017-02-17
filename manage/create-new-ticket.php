<?php
require 'boot.php';
Acl::isAllowed('create-new-ticket.php');
require ("views/$gat/create-new-ticket.tpl.php");