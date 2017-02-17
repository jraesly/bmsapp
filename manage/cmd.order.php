<?php
require 'boot.php';
$self = 'orders'.EXT;
$act = _get('_act');
$cmd = _get('_cmd');
if ($cmd=='' OR $act==''){
r2($self,'e','Action Not Defined');
}
if ($act=='accept'){
    $self = 'order'.EXT.'?_show='.$cmd;
 $d = ORM::for_table('orders')->find_one($cmd); 
 $d->status = 'Active';  
 $d->save();
 r2($self,'s','Order Marked as Active');
}

elseif ($act=='cancel'){
    $self = 'order'.EXT.'?_show='.$cmd;
 $d = ORM::for_table('orders')->find_one($cmd); 
 $d->status = 'Cancelled';  
 $d->save();
 r2($self,'s','Order Marked as Cancelled');
}

elseif ($act=='delete'){
   // $self = 'order'.EXT.'?_show='.$cmd;
 $d = ORM::for_table('orders')->find_one($cmd); 
// $d->status = 'Active';  
 $d->delete();
 r2($self,'s','Order Deleted Successfully');
}


else {
    
}