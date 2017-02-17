<?php

header('Content-Type: application/json');
require 'boot.php';

if (isset($_GET['start']) AND isset($_GET['end'])) {

    $start = $_GET['start'];
    $end = $_GET['end'];
    $data = array();

    $query = "SELECT DISTINCT date FROM transactions WHERE date >= '$start' AND date <= '$end' Order by date DESC";
    $results = ORM::for_table('transactions')
        ->raw_query($query)
        ->find_array();

    foreach ($results as $key => $value) {
        $cdate = $value['date'];
        $data[$key]['label'] = $cdate;
        $tamount = ORM::for_table('transactions')->select('amount')->where('date', $cdate)->sum('amount');
        $data[$key]['value'] =$tamount;
    }

    echo json_encode($data);
}
