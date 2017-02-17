<?php
require 'boot.php';
$notes = _post('note');
$clid = _post('id');
updateOne('accounts','notes',$notes,$clid);
