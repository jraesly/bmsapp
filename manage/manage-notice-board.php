<?php
require 'boot.php';
require ('../lib/paginator.sysfrm.php');
$paginate = _paginate('message_board');
$startpoint= $paginate['startpoint'];
$limit= $paginate['limit'];
$fpage=$paginate['page'];
$lpage=$paginate['lastpage'];
$tfound=$paginate['found'];
$query = "SELECT id,name,message from message_board ORDER BY id DESC LIMIT
{$startpoint} , {$limit}";
require ("views/$gat/manage-notice-board.tpl.php");