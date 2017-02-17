<?php
require 'boot.php';
$self='invoice-wizard'.EXT;

if (isset($_POST['submit'])){
prf();
    $cid = _post('accounts');
    if ($cid=='' OR $cid=='0'){
        r2($self,'e','You did not select Customer, Please Try Again');
    }
    $notes = _post('notes');
$created = date ('Y-m-d');
    $duedate = date ('Y-m-d');
    $amount = $_POST['amount'];


    $sTotal='0';
    foreach ($amount as $samount){
        $sTotal += $samount;
    }
    require ('../lib/invoice.class.php');
$invoice = new Invoices;
    $invAdd = $invoice->AddInvoice('10',$created,$duedate,'100','100','Unpaid','xyz','hello invoice');
    if ($invAdd){


    }
    else {
        r2($self,'e','An Error Occured While Adding Invoice. Please Try Again');
    }


$cnt=count($_POST['description']);
if ($cnt>0){
    for ($counter=0; $counter < $cnt; $counter++)
    {

        echo $counter. '<br>';
        //create your query here
    }
}
    else {
        r2($self,'e','Item Value is not posted. Please add item and item price and Try again');
    }



}
    r2($self,'e','Data Not Posted');
