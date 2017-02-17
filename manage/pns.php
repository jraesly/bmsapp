<?php
require 'boot.php';
$self='products-and-services'.EXT;
if (isset($_POST['action'])&&$_POST['action']=='edit'){
$name = _post('name');
if ($name==''){
r2($self,'e','Product name was empty, Please Try again');
}
$price = _post('price');
if (!is_numeric($price)){
  r2($self,'e','Invalid price amount, Please Try again');
}
$description = $_POST['description'];
$status = _post('status');
if ($status == 'Active'){
$ss = 'Show';	
}
else {
	$ss = 'Hidden';
}

$trid = _post('trid');
 $tr = ORM::for_table('products')->find_one($trid);
 $tr->set('name', $name);
 $tr->set('status', $ss);
  $tr->set('price', $price);
$tr->set('description', $description);
$tr->save(); 
  r2($self,'s','Product/Service details edited successfully');
}
elseif (isset($_POST['action'])&&$_POST['action']=='delete'){
    $trid = _post('trid');
  $tr = ORM::for_table('products')->find_one($trid);
$tr->delete();
r2($self,'s','Product/Service deleted successfully');    
    
}
else {

}