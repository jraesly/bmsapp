<?php
require 'boot.php';
$cmd = _get('_cmd');
$d = ORM::for_table('message_board')->find_one($cmd);
$d->delete();
r2('manage-notice-board.php','s','Notice Deleted Successfully');