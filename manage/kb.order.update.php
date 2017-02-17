<?php
require 'boot.php';
$action = _post('action');
$updateRecordsArray 	= $_POST['recordsArray'];

if ($action == "updateRecordsListings"){
	
	$listingCounter = 1;
	foreach ($updateRecordsArray as $recordIDValue) {
		
	//	$query = "UPDATE records SET recordListingID = " . $listingCounter . " WHERE recordID = " . $recordIDValue;
	//	mysql_query($query) or die('Error, insert query failed');
    $d = ORM::for_table('knowledgebasecats')->find_one($recordIDValue);
    $d->sorder = $listingCounter;
    $d->save();
		$listingCounter = $listingCounter + 1;	
	}
	
echo '<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success: </strong>Categories new positions are updated in the database
 
</div>';
}