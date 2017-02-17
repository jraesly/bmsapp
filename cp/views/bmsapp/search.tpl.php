<?php
$rid = _post('keyword');

 include ('sections/header.tpl.php'); 
 ?>
   <div class="span12">
<h4> Search Result For: <?php echo $rid; ?></h4>
<hr>
<div class="span12">
   

<?php
if ($rid==''){
echo '<p>Please Search with a keyword. Your keyword is empty</p>';	
}
else {
$art = ORM::for_table('knowledgebase')->where_like('title', "%$rid%")->find_many();
foreach ($art as $kbc) {
	//$id = $kbc['id'];
    $title = $kbc['title'];
	$article = $kbc['article'];
	echo " <h4>$title</h4>
    <p>$article</p>";
}
}

?>   
</div>
	</div>
    <?php include ('sections/footer.tpl.php'); ?>