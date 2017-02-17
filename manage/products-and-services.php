<?php
require 'boot.php';
Acl::isAllowed('products-and-services.php');
$self='products-and-services'. EXT;
if (isset($_POST['submit'])){
$title = _post('title');
$description = $_POST['description'];
$status = _post('status');
$price = _post('price');
if ($title==''){
r2($self,'e','Title is Required');
}
if (!is_numeric($price)){
  r2($self,'e','Invalid price amount, Please Try again');
}
$status = _post('status');
if ($status == 'Active'){
$ss = 'Show';	
}
else {
	$ss = 'Hidden';
}

//ACT START
$pns = ORM::for_table('products')->create();

$pns->name = $title ;
$pns->description = $description;
$pns->price= $price;
$pns->status= $ss;
$pns->save();
r2($self,'s','Item added Successfully');

//ACT END
}
require ("views/$gat/products-and-services.tpl.php");