<?php
require 'boot.php';
$self='revenue-graph.php';
Acl::isAllowed($self);
require ("views/$gat/revenue-graph.tpl.php");