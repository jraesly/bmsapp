<?php
require 'boot.php';
$notes = _post('note');
$clid = _post('id');
updateOne('tickets','notes',$notes,$clid);
