<?php

 include ('sections/header.tpl.php'); 
 ?>
   <div class="span12">


	<form class="form-horizontal" id="buy" method='post' action=''>
	  <fieldset>
	    <legend>Invoice Payment - </legend>
        
	    <h4>Invoice Total- <?php echo $total; ?></h4>
        <h4>Your Balance- <?php echo $clbalance; ?></h4>
	    <h4>New Balance Will be- <?php echo $nbal; ?></h4>
	
	
	<div class="control-group">
		<label class="control-label" for="input01"></label>
	      <div class="controls">
          <input name="act" type="hidden" value="confirm">
          <input name="invid" type="hidden" value="<?php echo $iid; ?>">
	       <?php echo $ftxt; ?>
	       <a href="invoice.php?_cmd=<?php echo $iid; ?>" class="btn btn-warning">Cancel</a>
	      </div>
	
	</div>
	
	
	   
	  </fieldset>
	</form>
	</div>
    <?php include ('sections/footer.tpl.php'); ?>