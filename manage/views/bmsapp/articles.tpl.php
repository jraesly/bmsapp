<?php
$xheader='<link rel="stylesheet" type="text/css" href="../assets/css/list-style.css">
<link rel="stylesheet" href="../lib/pnp/redactor/redactor/redactor.css" />
<link rel="stylesheet" href="../assets/lib/chosen/chosen.css" />
';

$xfooter = '

<script src="../assets/lib/chosen/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="../assets/js/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
						   
	$(function() {
		$("#kbc ol").sortable({ opacity: 0.6, cursor: \'move\', update: function() {
			var order = $(this).sortable("serialize") + \'&action=updateRecordsListings\'; 
			$.post("articles.order.update.php", order, function(theResponse){
				$("#resp").html(theResponse);
			}); 															 
		}								  
		});
	});

});	
</script>
  <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
<script src="../lib/pnp/redactor/redactor/redactor.min.js"></script>

	<script type="text/javascript">
	$(document).ready(
		function()
		{
			$(\'#redactor_content\').redactor({
				imageUpload: \'image_upload.php\',
				minHeight: 200 // pixels,
				minHeight: 200 // pixels
			});
		}
	);
	</script>
';
?>
<?php require ('sections/header.tpl.php'); ?>
<?php
$stract='
<input name="action" type="hidden" value="add">
<button id="submit" class="btn btn-primary" type="submit">Add Article</button>
		
		';
		$artid = _get('_xclick');
		$arttitle = '';
			$arttxt = '';
		if ($artid!=''){
			
			$art = ORM::for_table('knowledgebase')->find_one($artid);
			$arttitle = $art['title'];
			$arttxt = $art['article'];
			$artcatid = $art['catid'];
			$stract='
			<input name="trid" type="hidden" value="'.$artid.'">
			<button id="submit" class="btn btn-warning" name="action" value="edit" type="submit">Edit This Article</button>
		
		<button id="submit" class="btn btn-danger" name="action" value="delete" type="submit">Delete This Article</button>
		';
			
		}

?>
    <div class="container">
    <div class="row-fluid">
    <?php notify(); ?>
    </div>
    <div class="row-fluid">
    <form action="articles<?php echo EXT; ?>" method="post">
    <div class="span12 well">
    <h5><?php echo $_L['addArticle'];?>   </h5>
    
    


       <input name="title" type="text" class="input-block-level" id="title" placeholder="Article Title..." <?php
       if ($arttitle!='') echo "value=\"$arttitle\"";
	   
	   ?> >
       <textarea name="article" id="redactor_content"   class="input-block-level" rows="6" placeholder="Article Contents..."><?php
       if ($arttxt!='') echo $arttxt;
	   
	   ?></textarea>
       <select name="catid" id="cfilter"  data-placeholder="Choose a Category..." class="chzn-select" tabindex="2">
        <option value=""></option> 
          <?php
		  $accgroups = ORM::for_table('knowledgebasecats')->find_many();
$slctd = '';
foreach ($accgroups as $accgroup) {
	$id = $accgroup['id'];
    $name = $accgroup['name'];
	
	if ($artcatid==$id) {
	$slctd = 'selected="selected"';	
	}
	echo "<option value=\"$id\" $slctd>$name</option>";
}
		  
		  ?>
</select>
<span class="help-block">&nbsp;</span>
       
        
        <?php
		
		echo $stract;
		?>
    
</div>
    </form>
    </div>
    <div class="row-fluid">
    <div class="span12" id="kbc">
    <h5><?php echo $_L['articles'];?>   </h5>
    <span id="resp"><?php echo $_L['atd'];?>   </span>
    <ol class="rounded-list">
<?php
$ext = EXT;
$catid = _get('_cmd');
if ($catid!=''){
 $kbcs = ORM::for_table('knowledgebase')->select('id', 'title')->where('catid', $catid)->order_by_desc('id')->find_many();   
}
else {
$kbcs = ORM::for_table('knowledgebase')->select('id')->select('title')->order_by_asc('sorder')->find_many();	
}
foreach ($kbcs as $kbc) {
	$id = $kbc['id'];
    $title = $kbc['title'];
	echo "<li id='recordsArray_$id'><a href=\"articles$ext?_xclick=$id\">$title</a></li>";
}
		  
		  ?>					
		</ol>
    </div>
    </div>

    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>
