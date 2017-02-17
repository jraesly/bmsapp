<?php
@ini_set('memory_limit', '512M');
@ini_set('max_execution_time', 0);
@set_time_limit(0);
define("_APP_RUN", true);
require '../AppINIT.php';
// find all recurring invoice due today
$today = date('Y-m-d');
$items = ORM::for_table('invoices')->where_gt('recurring', '0')->where('duedate', $today)->find_many();
$i='0';
$format = 'Y-m-d';
foreach ($items as $item) {
   $iid = $item['id'];
    $date = date('Y-m-d');
    $notes = $item['notes'];
    $recurring = $item['recurring'];
    $vtoken = _raid(10);
    $ptoken = _raid(10);
    $created = $date;
    $duedate = $date;
    $amount = $item['total'];
    $cid = $item['userid'];

    ////////////////////////////////
    $cmd = ORM::for_table('invoices')->find_one($iid);
    $cmd->recurring='0';
    $cmd->save();
/////////////////////////////////////////////////////////////

  //  $item = _post('item');





    $d = ORM::for_table('invoices')->create();
    $d->userid = $cid;
    $d->created = $date;
    $d->duedate = $date;
    $d->subtotal = $amount;
    $d->total = $amount;
    $d->status = 'Unpaid';
    $d->recurring = $recurring;
    $d->vtoken = $vtoken;
    $d->ptoken = $ptoken;
    $d->save();
    $invoiceid= $d->id();
    //find the item for old invoice

    $cmd = ORM::for_table('invoiceitems')->where('invoiceid', $iid)->find_one();

    $description = $cmd['description'];

    //
    $d = ORM::for_table('invoiceitems')->create();
    $d->invoiceid = $invoiceid;
    $d->userid = $cid;
    $d->description = $description;
    $d->amount = $amount;
    $d->save();

    //
}
