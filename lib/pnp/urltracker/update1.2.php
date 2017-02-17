<?php include('config.php'); ?>
<?php

//create index
$query = "ALTER TABLE tbl_clicks ADD INDEX (url_name)";
$result = mysql_query($query,$GLOBALS['DB']);

echo 'Z.ips.ME updated successfully!  You can now log in to your Admin page <a href="admin.php">here</a>';

?>