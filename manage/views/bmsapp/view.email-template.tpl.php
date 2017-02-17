<?php
$cs = '';
$send = $d['send'];
if ($send=='1'){
$cs = ' checked="checked"';	
}
$xheader='
<link type="text/css" rel="stylesheet" href="../assets/lib/toggle/ui.switchbutton.min.css" />
<link rel="stylesheet" href="../lib/pnp/redactor/redactor/redactor.css" />
';
$xfooter = '
<script src="../lib/pnp/redactor/redactor/redactor.min.js"></script>

	<script type="text/javascript">
	$(document).ready(
		function()
		{
			
			$(\'#redactor_content\').redactor({
				imageUpload: \'image_upload.php\',
				convertDivs: false
			});
			
		}
	);
	</script>
	<script type="text/javascript" src="../assets/lib/toggle/demo/jquery.tmpl.min.js"></script>
		<script type="text/javascript" src="../assets/lib/toggle/demo/jquery-ui-1.8.16.custom.min.js"></script>
		<script type="text/javascript" src="../assets/lib/toggle/jquery.switchbutton.min.js"></script>
		<script type="text/javascript">
		$(function(){
			
	
	$(".common:checkbox").switchbutton();
		});
		</script>
';

?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
    <div class="row-fluid">
    <?php notify(); ?>
    </div>
<div class="row-fluid">
<div class="span12 well">
<form method="post" action="view.email-template.php">
  <fieldset>
    <legend><?php echo $_L['Edit_Email_Template'];?></legend>
    <label><?php echo $_L['name'];?></label>
    <input name="tplname" type="text" disabled="disabled" class="input-xxlarge" id="tplname" value="<?php echo $d['tplname']; ?>">
    <label><?php echo $_L['subject'];?></label>
    <input name="subject" type="text" class="input-xxlarge" id="subject" value="<?php echo $d['subject']; ?>">
   <label><?php echo $_L['status'];?></label>
    <input name="send" type="checkbox" class="common" id="switch1" value="1" <?php echo $cs; ?> />
    <label><?php echo $_L['Email_Body'];?></label>
    <textarea rows="5" name="message"  id="redactor_content" class="input-block-level"><?php echo $d['message']; ?></textarea>
    
    
    <div class="form-actions">
    <input name="act" type="hidden" value="edit">
    <input name="id" type="hidden" value="<?php echo $cmd; ?>">
      <button type="submit" name="submit" class="btn btn-primary"><?php echo $_L['submit'];?></button>
  <button type="reset" class="btn"><?php echo $_L['cancel'];?></button>
</div>
  </fieldset>
</form>
</div>
</div>

    </div><!-- /container -->
<?php require ('sections/footer.migrate.tpl.php'); ?>