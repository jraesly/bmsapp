<?php
$xheader = '<link rel="stylesheet" href="../lib/pnp/redactor/redactor/redactor.css" />';
$xfooter = '<script src="../lib/pnp/redactor/redactor/redactor.min.js"></script>

	<script type="text/javascript">
	$(document).ready(
		function()
		{
			$(\'#note\').redactor({
				imageUpload: \'image_upload.php\',
				minHeight: 200 // pixels
			});
		}
	);
	</script> 
	
<script>
$("input[type=\'button\'][name=\'update\']").click(function(e){
$this = $(this);
$this.val("Saving...."), 
$this.prop(\'disabled\', true),
$(\'#loading\').css(\'visibility\',\'visible\');
$.ajax({
   type: "POST",
   url: "update.order.notes.php",
   data:{
    id: \''.$cmd.'\',
    note: $(\'#note\').val()
    },
   success: function(msg){
	   
       $this.val("Saved");
	   $this.prop(\'disabled\', false);
	   $(\'#loading\').css(\'visibility\',\'hidden\');
	   
   }
})
});
</script>	
	
	
	';

 require ('sections/header.tpl.php'); ?>
    <div class="container">
    <?php notify(); ?>
    <div class="row-fluid">
<div class="span12">
<h4><?php echo $_L['order'];?># <?php echo $cmd; ?></h4>

</div>
</div>

<div class="row-fluid">
<div class="span12">
<div class="span1">
    <a href="cmd.order.php?_cmd=<?php echo $cmd; ?>&amp;_act=accept" class="btn btn-primary">
        <i class="icon-pencil icon-white"></i>
        <span><strong><?php echo $_L['Accept'];?></strong></span>            
    </a>
</div>
<div class="span1">
	<a href="cmd.order.php?_cmd=<?php echo $cmd; ?>&amp;_act=cancel" class="btn btn-primary">
        <i class="icon-eye-open icon-white"></i>
        <span><strong><?php echo $_L['cancel'];?></strong></span>        	
    </a>
</div>
<div class="span1">
    <a href="cmd.order.php?_cmd=<?php echo $cmd; ?>&amp;_act=delete" class="btn btn-warning">
    	<i class="icon-trash icon-white"></i>
	    <span><strong><?php echo $_L['Delete'];?></strong></span>        	
    </a>
</div>

</div>

</div>

<div class="row-fluid">
<div class="span12">
<hr>

</div>
</div>
<form class="well span12" method="post" action="email.order.activation.php">
  <div class="row">
		<div class="span4">
			<h4><?php echo $_L['Order_Number'];?>- <?php echo $ordernum; ?></h4>
            <p>
            <strong><?php echo $_L['Customer_Name'];?>: </strong> <?php echo $clname; ?>
            
            <br>
<strong><?php echo $_L['products_services'];?>: </strong> <?php echo $pname; ?>
            
            <br>
            <strong><?php echo $_L['Order_Date'];?>: </strong> <?php echo $date; ?>
            
            <br>
<strong><?php echo $_L['Order_Status'];?>: </strong> <?php echo $sttxt; ?>
            
            <br>
<strong><?php echo $_L['Invoice'];?>: </strong> <?php echo $invoiceid; ?>
            
            <br>

            <strong><?php echo $_L['IP'];?>: </strong> <?php echo $ipaddress; ?>
            
            <br>
            
            </p>
		</div>
		<div class="span8">
			<label><?php echo $_L['activation_message'];?></label>
			 <textarea class="input-block-level" id="note"  name="message" rows="5"><?php echo $notes; ?></textarea>
            <input name="oid" type="hidden" value="<?php echo $cmd; ?>">
		</div>
	<p>&nbsp;</p>
    <div class="pull-right">

        <input type="submit" value="Send Email" class="btn btn-warning" />
    <input type="button" name="update" value="Save" class="btn btn-primary" />
    </div>
		
	</div>
</form>

    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>