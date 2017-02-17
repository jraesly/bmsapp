<?php
$xheader='<link rel="stylesheet" type="text/css" href="../assets/css/list-style.css">

';
$xfooter = '<script type="text/javascript" src="../assets/js/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
						   
	$(function() {
		$("#kbc ol").sortable({ opacity: 0.6, cursor: \'move\', update: function() {
			var order = $(this).sortable("serialize") + \'&action=updateRecordsListings\'; 
			$.post("support-departments.order.update.php", order, function(theResponse){
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
<button id="submit" name="action" value="add" class="btn btn-primary" type="submit">Add Department</button>
		
		';
		$depid = _get('_xclick');
		$depname = '';
		$depemail = '';	
		$depshow = 'Yes';
		if ($depid!=''){
			
			$dep = ORM::for_table('ticketdepartments')->find_one($depid);
			$depname = $dep['name'];
			$depemail = $dep['email'];
			$depshow = $dep['show'];
			$stract='
			<input name="id" type="hidden" value="'.$depid.'">
			<button id="submit" name="action" value="edit" class="btn btn-warning" type="submit">Save Changes</button>
		
		<button id="submit" name="action" value="delete" class="btn btn-danger" type="submit">Delete</button>
		<a href="support-departments.php" class="btn btn-primary"> Cancel </a>
		';
			
		}

?>
    <div class="container">
    <div class="row-fluid">
    <?php notify(); ?>
    </div>
    <div class="row-fluid">
    <form action="support-departments.php" method="post">
    <div class="span12 well">
    <h5><?php echo $_L['addNewSupportDepartment'];?></h5>
       <input name="name" type="text" class="input-block-level" value="<?php echo $depname; ?>" placeholder="Department Name...">
        <input name="email" type="text" class="input-block-level" value="<?php echo $depemail; ?>" placeholder="Department Email...">
      <label><?php echo $_L['showInaPortal'];?></label>  
        <label class="radio">
  <input type="radio" name="show" id="optionsRadios1" value="Yes" <?php if ($depshow=='Yes') { echo 'checked';} ?>>
<?php echo $_L['yes'];?></label>
<label class="radio">
  <input type="radio" name="show" id="optionsRadios2" value="No" <?php if ($depshow=='No') { echo 'checked';} ?>>
<?php echo $_L['no'];?></label><br>


        <?php
		
		echo $stract;
		?>
    
</div>
    </form>
    </div>
    <div class="row-fluid">
    <div class="span12" id="kbc">
    <h5><?php echo $_L['supportDepartment'];?></h5>
    <span id="resp"><?php echo $_L['dgdrop'];?></span>
    <ol class="rounded-list">
<?php
$kbcs = ORM::for_table('ticketdepartments')->order_by_asc('order')->find_many();
foreach ($kbcs as $kbc) {
	$id = $kbc['id'];
    $name = $kbc['name'];
	echo "<li id='recordsArray_$id'><a href=\"support-departments.php?_xclick=$id\">$name</a></li>";
}
		  
		  ?>					
		</ol>
        
    </div>
    </div>

    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>
