<?php
$xheader='<link rel="stylesheet" type="text/css" href="../assets/css/list-style.css">

';
$xfooter = '<script type="text/javascript" src="../assets/js/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
						   
	$(function() {
		$("#kbc ol").sortable({ opacity: 0.6, cursor: \'move\', update: function() {
			var order = $(this).sortable("serialize") + \'&action=updateRecordsListings\'; 
			$.post("kb.order.update.php", order, function(theResponse){
				$("#resp").html(theResponse);
			}); 															 
		}								  
		});
	});

});	
</script>
';

?>
<?php require ('sections/header.tpl.php'); ?>
<?php
$stract='
<input name="action" type="hidden" value="add">
<button id="submit" name="action" value="add" class="btn btn-primary" type="submit">Add Category</button>
		
		';
		$artid = _get('_xclick');
		$arttitle = '';
			
		if ($artid!=''){
			
			$art = ORM::for_table('knowledgebasecats')->find_one($artid);
			$arttitle = $art['name'];
			
			$stract='
			<input name="id" type="hidden" value="'.$artid.'">
			<button id="submit" name="action" value="edit" class="btn btn-warning" type="submit">Edit This Category</button>
		
		<button id="submit" name="action" value="delete" class="btn btn-danger" type="submit">Delete This Category</button>
		';
			
		}

?>
    <div class="container">
    <div class="row-fluid">
    <?php notify(); ?>
    </div>
    <div class="row-fluid">
    <form action="kb<?php echo EXT; ?>" method="post">
    <div class="span12 well">
    <h5><?php echo $_L['adnewkn'];?></h5>
       <input name="catname" type="text" class="input-block-level" value="<?php echo $arttitle; ?>" placeholder="Category Name...">
       
        <?php
		
		echo $stract;
		?>
    
</div>
    </form>
    </div>
    <div class="row-fluid">
    <div class="span12" id="kbc">
    <h5><?php echo $_L['addCategory'];?></h5>
    <span id="resp"><?php echo $_L['ctd'];?></span>
    <ol class="rounded-list">
<?php
$ext = EXT;
$kbcs = ORM::for_table('knowledgebasecats')->order_by_asc('sorder')->find_many();
foreach ($kbcs as $kbc) {
	$id = $kbc['id'];
    $name = $kbc['name'];
	echo "<li id='recordsArray_$id'><a href=\"kb$ext?_xclick=$id\">$name</a></li>";
}
		  
		  ?>					
		</ol>
        
    </div>
    </div>

    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>
