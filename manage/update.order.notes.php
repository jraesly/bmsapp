<?php
require 'boot.php';
$notes = $_POST['note'];
$clid = _post('id');
updateOne('orders','notes',$notes,$clid);
