<?php
$rid = _get('_xclick');
$xheader='<link rel="stylesheet" type="text/css" href="../assets/css/list-style.css">

';
 include ('sections/header.tpl.php'); 
 ?>
   <div class="span12">

<ol class="rounded-list">
<?php
$ext = EXT;
$kbcs = ORM::for_table('knowledgebase')->select('id')->select('title')->where('catid', $rid)->order_by_asc('sorder')->find_many();

foreach ($kbcs as $kbc) {
	$id = $kbc['id'];
    $name = $kbc['title'];
	echo "<li><a href=\"article$ext?_i=$id\">$name</a></li>";
}


		  
		  ?>					
		</ol>
	
	</div>
    <?php include ('sections/footer.tpl.php'); ?>