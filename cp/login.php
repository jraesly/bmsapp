<?php
require "boot.b4login.php";

if (isset($_GET['_after'])){
	$after = $_GET['_after'];
}
else {
	$after = 'home.php';
}
require ("views/$gTheme/login3.tpl.php");