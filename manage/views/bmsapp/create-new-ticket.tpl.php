<?php
$xheader='
<link rel="stylesheet" href="../lib/pnp/redactor/redactor/redactor.css" />
<link rel="stylesheet" href="../assets/lib/chosen/chosen.css" />
';
$xfooter='<script src="../assets/lib/chosen/chosen.jquery.js" type="text/javascript"></script>

  <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); 
 
  </script>
 <script src="../lib/pnp/redactor/redactor/redactor.min.js"></script>

	<script type="text/javascript">
	$(document).ready(
		function()
		{
			$(\'#redactor_content\').redactor({
				imageUpload: \'image_upload.php\',
				minHeight: 200 // pixels
			});
		}
	);
	</script> 
  ';
?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
<div class="row-fluid">
<div class="span12 well">
<form method="post" action="cmd.tickets.php">
  <fieldset>
    <legend><?php echo $_L['createNewSupportTicket'];?></legend>
    <label><?php echo $_L['ticketFor'];?></label>
    <select name="accounts" data-placeholder="Choose Customer Account" id="accounts" class="chzn-select" tabindex="2">
                    <option value="0"><?php echo $_L['chooseContact'];?></option>
                     <?php
$query = "SELECT id, name, company from accounts WHERE (acctype='Customer') ORDER BY id ASC";
$stmt = $dbh->prepare("$query");
$stmt->execute();
$result = $stmt->fetchAll();
$i="0";
$ext = EXT;
if ($stmt->rowCount() > 0) {
    foreach($result as $value) {
				$i++;
				
        $id = $value['id'];
		$name = $value['name'];
		
		$company = $value['company'];
		if ($company!=''){
			$company = '( '.$company.' )';
		}
		
		echo "<option value=\"$id\">$name $company</option>";
	}
}
?>
                </select>
    <label><?php echo $_L['subject'];?></label>
    <input name="subject" type="text" class="input-block-level" id="subject">
    <label><?php echo $_L['message'];?></label>
   <textarea class="input-block-level" id="redactor_content"  name="message" rows="5"></textarea>
    <label><?php echo $_L['chooseDepartment'];?></label>
    <label>
   <select name="did" class="chzn-select" tabindex="2">
 <?php
		  $accgroups = ORM::for_table('ticketdepartments')->where('show', 'Yes')->order_by_asc('order')->find_many();

foreach ($accgroups as $accgroup) {
	$id = $accgroup['id'];
    $name = $accgroup['name'];
	$xthis ='';
	if ($dep=="$name"){
		$xthis = 'selected="selected"';
	}
	echo "<option value=\"$id\" $xthis>$name</option>";
}
		  
		  ?>
</select>
</label>
    
     <button type="submit" name="submit" value="new" class="btn btn-primary"><?php echo $_L['submit'];?></button>
  </fieldset>
</form>
</div>
</div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>