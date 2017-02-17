<?php
$rid = _get('_i');
$art = ORM::for_table('knowledgebase')->find_one($rid);
			$arttitle = $art['title'];
			$arttxt = $art['article'];
 include ('sections/header.tpl.php'); 
 ?>
   <div class="span12">
<h4> <?php echo $arttitle; ?></h4>
<p>
<?php echo $arttxt; ?> 

</p>
	</div>
    <?php include ('sections/footer.tpl.php'); ?>