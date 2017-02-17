<?php
require 'boot.php';
Acl::isAllowed('url-tracker.php');
$self='url-tracker'. EXT;
include('../lib/pnp/urltracker/config.php');
	$logged_in = 'y';

	
	if (isset($_POST['url_submitted'])) {
		$url = prepQueryText($_POST['url']);
		$url_name = prepQueryText($_POST['url_name']);
		$url_name = stripLink($url_name);
		$type = $_POST['type'];
		if (linkAvailable($url_name)) {
			insertLink($url_name, $url, $type);
			$alert = 'Link created successfully! <a target="_blank" href="' . SITE_URL . $url_name . '">' . SITE_URL . $url_name . '</a> now redirects to ' . $url;		
		} else {
			$alert = 'The link name ' . $url_name . ' is already being used.  Try a different name or edit the existing link';
		}
						  
	}
	
	if (isset($_POST['edit_submitted'])) {
		$url = prepQueryText($_POST['url']);
		$url_name = prepQueryText($_POST['url_name']);
		$type = $_POST['type'];
		updateLink($url_name, $url, $type);
		$alert = 'Update successful!';
	}
	
	if (isset($_GET['summary'])) { 
		$url_name = prepQueryText($_GET['summary']);
		$summary = new Stats($url_name);
		$view = 'stats';
	}
	
	if (isset($_GET['edit'])) { 
		$url_name = prepQueryText($_GET['edit']);
		$edit = new Info($url_name);
		$view = 'edit';
	}
	
	if (isset($_GET['delete'])) { 
		$url_name = prepQueryText($_GET['delete']);
		deleteLink($url_name);
		$alert = $url_name . ' has been permanently deleted.';
	}

require ("views/$gat/url-tracker.tpl.php");

