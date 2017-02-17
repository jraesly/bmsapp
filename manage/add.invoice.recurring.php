<?php
require 'boot.php';
$self='invoice-recurring'.EXT;
if (isset($_POST['submit'])){
prf();
    $cid = _post('accounts');
    if ($cid=='' OR $cid=='0'){
        r2($self,'e','You did not select Customer, Please Try Again');
    }
    $date = _post('date');
    $item = _post('item');
    $notes = _post('notes');
    $recurring = _post('frequency');
    $vtoken = _raid(10);
    $ptoken = _raid(10);
    $created = $date;
    $duedate = $date;
    $amount = $_POST['amount'];
    $frequency = _post('frequency');
    $times=_post('schedule_time');

    $add_days =$frequency;

      for($i=1;$i<=$times;$i++){

          @$paid+=(24*3600*$add_days);

          var_dump($paid);

          $paid_date=date('Y-m-d',strtotime($date)+$paid);

          $d = ORM::for_table('invoices')->create();
          $d->userid = $cid;
          $d->created = $date;
          $d->duedate = $paid_date;
          $d->subtotal = $amount;
          $d->total = $amount;
          $d->status = 'Unpaid';
          $d->recurring = $recurring;
          $d->vtoken = $vtoken;
          $d->ptoken = $ptoken;
          $d->save();
          $invoiceid= $d->id();
          $d = ORM::for_table('invoiceitems')->create();
          $d->invoiceid = $invoiceid;
          $d->userid = $cid;
          $d->description = $item;
          $d->amount = $amount;
          $d->save();

      }

r2($self,'s','Recurring Invoice Created Successfully');
  
}
    r2('manage-accounts'.EXT,'e','Data Not Posted');
