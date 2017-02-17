<?php
$xheader='
<link rel="stylesheet" href="../lib/pnp/redactor/redactor/redactor.css" />
';
$xfooter = '

	
<script src="../lib/pnp/redactor/redactor/redactor.min.js"></script>

	<script type="text/javascript">
	$(document).ready(
		function()
		{
			$(\'#redactor_content\').redactor({
				imageUpload: \'image_upload.php\'
			});
		}
	);
	</script> 	
	';
 include ('sections/header.tpl.php');
  ?>
   <div class="span12">
<?php notify(); ?>

	<form class="form-horizontal" id="create-ticket" method='post' action='create-ticket<?php echo EXT; ?>'>
	  <fieldset>
	    <legend><?php echo $_L['create_new_support_ticket']; ?> </legend>
        <div class="control-group">
	      <label class="control-label" for="name"><?php echo $_L['name']; ?></label>
	      <div class="controls">
    <div class="input-prepend">
      <span class="add-on"><i class="icon-user"></i></span>
      <input type="text" disabled="disabled" class="input-xlarge" id="inputIcon" value="<?php  echo $cl['name']; ?>">
    </div>
  </div>
	</div>
	    <div class="control-group">
	      <label class="control-label" for="email"><?php echo $_L['email']; ?></label>
	      <div class="controls">
    <div class="input-prepend">
      <span class="add-on"><i class="icon-envelope"></i></span>
      <input name="email" type="text" disabled="disabled" class="input-xlarge" id="inputIcon" value="<?php  echo $cl['email']; ?>">
    </div>
  </div>
	</div>
	    <div class="control-group">
	      <label class="control-label" for="input01"><?php echo $_L['Department']; ?></label>
	      <div class="controls">
	        <select name="department" id="department" >
            				
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
	       
	      </div>
	
	</div>
    <div class="control-group">
	      <label class="control-label" for="subject"><?php echo $_L['Subject']; ?></label>
	      <div class="controls">
	        <input type="text" class="input-xxlarge" id="subject" name="subject">
	        
	      </div>
	</div>
	<div class="control-group">
	      <label class="control-label" for="message"><?php echo $_L['message']; ?></label>
	      <div class="controls">
	        <textarea rows="6" id="redactor_content"  name="message" class="input-block-level"></textarea>
	        
	      </div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="submit"></label>
	      <div class="controls">
	       <button type="submit" name="submit" class="btn btn-inverse"><?php echo $_L['Create_Ticket']; ?></button>
	       
	      </div>
	
	</div>
	
	
	   
	  </fieldset>
	</form>
	</div>
    <?php include ('sections/footer.tpl.php'); ?>