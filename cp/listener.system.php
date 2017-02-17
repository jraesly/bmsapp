<?php
require 'boot.php';
$self = 'my-transactions'.EXT;
$cmd = _get('_cmd');
if ($cmd=='TrID'){
r2($self,'s','Transaction Successful. Waiting for Admin Approval');
}
elseif ($cmd=='0'){
r2($self,'e','Transaction Cancelled');
}
elseif($cmd=='listener'){
    
  //process listner  
    
}
else {
    
}

