<?php
require 'boot.php';
Acl::isAllowed('database-cleanup.php');
$self = 'database-cleanup' . EXT;
$cmd = _get('_cleanup');
if ($cmd == 'logs') {
    $OneMonthAgo = date('Y-m-d', strtotime('-30 days'));
    $d = ORM::for_table('logs')
        ->where_lte('date', $OneMonthAgo)
        ->delete_many();

    r2($self, 's', 'All System Logs older than ' . $OneMonthAgo . ' has been deleted');

} elseif ($cmd == 'email_logs') {

    $OneMonthAgo = date('Y-m-d', strtotime('-30 days'));
    $d = ORM::for_table('email_logs')
        ->where_lte('date', $OneMonthAgo)
        ->delete_many();

    r2($self, 's', 'All Email Logs older than ' . $OneMonthAgo . ' has been deleted');

} elseif ($cmd == 'notice-board') {

    $OneMonthAgo = date('Y-m-d', strtotime('-30 days'));
    $d = ORM::for_table('message_board')
        ->where_lte('post_dt', $OneMonthAgo)
        ->delete_many();

    r2($self, 's', 'All Notice Board Contents older than ' . $OneMonthAgo . ' has been deleted');

} elseif ($cmd == 'enquiries') {

    $OneMonthAgo = date('Y-m-d', strtotime('-30 days'));
    $d = ORM::for_table('enquiries')
        ->where_lte('date', $OneMonthAgo)
        ->delete_many();

    r2($self, 's', 'All Enquiries Contents older than ' . $OneMonthAgo . ' has been deleted');

} else {

}
require("views/$gat/database-cleanup.tpl.php");