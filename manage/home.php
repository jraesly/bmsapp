<?php
require 'boot.php';
$self='home.php';
Acl::isAllowed($self);
$btbal = ORM::for_table('accounts')->where('acctype', 'Bank')->sum('balance');
$btbal = number_format($btbal,2);
//echo $btbal;
$ctbal = ORM::for_table('accounts')->where('acctype', 'Customer')->sum('balance');
$ctbal = number_format($ctbal,2);
$ltbal = ORM::for_table('accounts')->where('acctype', 'Long-Term-Liability')->sum('balance');
$ltbal = number_format($ltbal,2);
$abal = ORM::for_table('accounts')->sum('balance');
$abal = number_format($abal,2);
//
$na = ORM::for_table('accounts')->count();
$ni = ORM::for_table('invoices')->count();
$nt = ORM::for_table('tickets')->count();
$ne = ORM::for_table('enquiries')->count();
//
//for chart
//get invoice percent
function percent($num_amount, $num_total) {
    $count1 = $num_amount / $num_total;
    $count2 = $count1 * 100;
    $count = number_format($count2, 2);
    return $count;
}
$tui = ORM::for_table('invoices')->where('status', 'Unpaid')->count();
$tci = ORM::for_table('invoices')->where('status', 'Cancelled')->count();
$tuip = percent($tui,$ni);
$tcip = percent($tci,$ni);
$ttip = 100-($tuip+$tcip);
require ("views/$gat/home.tpl.php");
