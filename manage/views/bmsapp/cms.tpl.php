<?php
$xheader='
<link rel="stylesheet" href="../lib/pnp/redactor/redactor/redactor.css" />
';
$xfooter='
 <script src="../lib/pnp/redactor/redactor/redactor.min.js"></script>

	<script type="text/javascript">
	$(document).ready(
		function()
		{
			$(\'#redactor_content\').redactor({
				convertDivs: false,
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
<div class="span12">
<?php notify(); ?>
<h3><?php echo $_L['Client_Area_Homepage'];?></h3>
 <form action="cms.php" method="post">
 <textarea class="input-block-level" id="redactor_content"  name="contents" rows="5"><?php echo $contents; ?></textarea>
 <div class="form-actions">  
          
          <input name="act" type="hidden" value="save" />
            <button type="submit" name="submit" class="btn btn-primary"><?php echo $_L['Save_Contents'];?></button>
            
          </div>
 </form>
</div>
</div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>