<?php
require 'boot.php';
Acl::isAllowed('sticky-note.php');
$self='sticky-note'. EXT;
// Including the DB connection file:
require '../lib/pnp/stickynote/connect.php';

// Removing notes that are older than an hour:
mysql_query("DELETE FROM notes WHERE id>3 AND dt<SUBTIME(NOW(),'0 1:0:0')");

$query = mysql_query("SELECT * FROM notes ORDER BY id DESC");

$notes = '';
$left='';
$top='';
$zindex='';

while($row=mysql_fetch_assoc($query))
{
	// The xyz column holds the position and z-index in the form 200x100x10:
	list($left,$top,$zindex) = explode('x',$row['xyz']);

	$notes.= '
	<div class="note '.$row['color'].'" style="left:'.$left.'px;top:'.$top.'px;z-index:'.$zindex.'">
		'.htmlspecialchars($row['text']).'
		<div class="author">'.htmlspecialchars($row['name']).'</div>
		<span class="data">'.$row['id'].'</span>
	</div>';
}
require ("views/$gat/sticky-note.tpl.php");