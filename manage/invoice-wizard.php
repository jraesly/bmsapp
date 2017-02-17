<?php
require 'boot.php';
$self='invoice-wizard.php';
Acl::isAllowed($self);
# v 2.3.0
$products = '';
$ic = ORM::for_table('products')->count();
if ($ic > 0){
    $items = ORM::for_table('products')->select_many('id', 'name', 'price')->order_by_desc('id')->find_many();
    foreach ($items as $item) {
        $products .= '"'.$item['name'].'",';
    }
    $products = rtrim($products,',');
}

require ("views/$gat/invoice-wizard.tpl.php");