<?php
require 'boot.php';
$trdate = _post('trdate');
$trfrom = _post('trfrom');
$error = '0';
$errormsg = '';
if ($trfrom==''){
    $error='1';
    $errormsg .= 'You didn\'t enter From account and Target Account Correctly. ';
}
$trto = _post('trto');
if ($trto==''){
     $error='1';
}
if ($trfrom==$trto){
     $error='1';
     $errormsg .= 'From Account and Target Account Can\'t be same. ';
}
$amount = _post('amount');
if (!is_numeric($amount)) {
     $error='1';
  $errormsg .= 'Please Enter a valid Amount. ';  
    }
$memo = _post('memo');
if ($memo==''){
     $error='1';
     $errormsg .= 'Please Enter a memo for this transaction. ';  
}
$trtype = _post('trtype');
if ($trtype==''){
     $error='1';
     $errormsg .= 'An error occured, Please Try again!';  
}
?>
<?php
if ($error!='0'){
 echo "
 <div class=\"alert fade in\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
            <strong>Error!</strong> $errormsg 
          </div>
 "   ;
}
else {
  //everything is okay, now add transaction


$tr = ORM::for_table('transactions')->create();
 $tr->ttype=$trtype;
 $tr->tfrom=$trfrom;
 $tr->tto=$trto;
 $tr->amount=$amount;
 $tr->date=$trdate;
 $tr->memo=$memo;
 $tr->status='Completed';
 
$acc = ORM::for_table('accounts')->find_one($trfrom);
$cbal= $acc['balance'];
$tfromacc=$acc['name'];
$tr->tfromacc=$tfromacc;
$nbal = $cbal-$amount;
$acc->set('balance', $nbal);
$acc->save();
$acc = ORM::for_table('accounts')->find_one($trto);
$cbal= $acc['balance'];
$ttoacc = $acc['name'];
$tr->ttoacc=$ttoacc;
$nbal = $cbal+$amount;
$acc->set('balance', $nbal);
$acc->save();
$tr->save();   
echo "
 <div class=\"alert alert-success fade in\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
            <strong>Success!</strong> Transaction Added Successfully. Please reload the page. 
          </div>
          ";

}
