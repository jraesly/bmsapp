<?php
$xheader='<link rel="stylesheet" type="text/css" href="../assets/css/list-style.css">

';
 include ('sections/header.b4login.tpl.php'); 
 ?>
   <div class="span12">

<ol class="rounded-list">
<?php
$ext = EXT;
$kbcs = ORM::for_table('knowledgebasecats')->order_by_asc('sorder')->find_many();
foreach ($kbcs as $kbc) {
	$id = $kbc['id'];
    $name = $kbc['name'];
	echo "<li id='recordsArray_$id'><a href=\"articles$ext?_xclick=$id\">$name</a></li>";
}
		  
		  ?>					
		</ol>
	
	</div>
    <?php include ('sections/footer.tpl.php'); ?>