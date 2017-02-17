<?php 
define("_APP_RUN", true);
require ('AppINIT.php');
include('lib/pnp/urltracker/config.php'); 

$url_name = prepQueryText($_GET['_ref']);
if (linkExists($url_name)) {
	$referrer = $_SERVER['HTTP_REFERER'];
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$ip_address = getIpAddress();	
	insertClick($url_name, $referrer, $user_agent, $ip_address);
	redirectClick($url_name);
} else {
	redirect(SITE_URL, '301');
}
?>