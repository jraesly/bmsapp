<?php
require 'boot.php';
$d= ORM::for_table('paymentgateways')->where('processor', 'manualpayment')->find_one();
require ("views/$gTheme/manual-payment.tpl.php");