<?php
require 'boot.php';
$self = 'transactions' . EXT;
if (isset($_POST['action']) && $_POST['action'] == 'edit') {
    $memo = _post('memo');

    $idate = _post('date');

    if ($memo == '') {
        r2($self, 'e', 'Memo was empty');
    }
    if ($date == '') {
        r2($self, 'e', 'Date was empty');
    }
    require('../lib/validator.class.php');
    if (!is_valid::Date($date)) {
        r2($self, 'e', 'Invalid Date Format');
    }
    $trid = _post('trid');
    $tr = ORM::for_table('transactions')->find_one($trid);
    $tr->set('memo', $memo);
    $tr->set('date', $date);
    $tr->save();
    r2($self, 's', 'Transaction edited successfully');
} elseif (isset($_POST['action']) && ($_POST['action'] == 'delete')) {
    $trid = _post('trid');
    $tr = ORM::for_table('transactions')->find_one($trid);
    $trfrom = $tr['tfrom'];
    $trto = $tr['tto'];
    $amount = $tr['amount'];
    // add balance to the trfrom
    $acc = ORM::for_table('accounts')->find_one($trfrom);
    if ($acc['id'] > 0) {
        $cbal = $acc['balance'];
        $nbal = $cbal + $amount;
        $acc->set('balance', $nbal);
        $acc->save();
    }
    $acc = ORM::for_table('accounts')->find_one($trto);
    if ($acc['id'] > 0) {
        $cbal = $acc['balance'];
        $nbal = $cbal - $amount;
        $acc->set('balance', $nbal);
        $acc->save();
    }
// now delete the transaction
    $tr->delete();
    r2($self, 's', 'Transaction deleted successfully');

} else {

}