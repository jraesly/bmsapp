<?php
require 'boot.php';
Acl::isAllowed('payment-gateways.php');
$self='payment-gateways.php';
require ("views/$gat/payment-gateways.tpl.php");