<?php
 include ('sections/header.tpl.php'); 
 ?>
   <div class="span8">

<?php notify(); ?>
	<form class="form-horizontal" id="add-fund" method='post' action=''>
	  <fieldset>
	    <legend><?php echo $_L['add_fund']; ?> </legend>
	    <div class="control-group">
	      <label class="control-label" for="input01"><?php echo $_L['amount']; ?></label>
	      <div class="controls">
	        <input type="text" class="input-small" id="amount" name="amount">
	        
	      </div>
	</div>
	    <div class="control-group">
	      <label class="control-label" for="input01"><?php echo $_L['payment_method']; ?></label>
	      <div class="controls">
	        <select name="pmethod" id="pmethod" >
            				<?php
$query = "SELECT name, processor from paymentgateways where status='Active' ORDER BY sorder DESC";
$stmt = $dbh->prepare("$query");
$stmt->execute();
$result = $stmt->fetchAll();
if ($stmt->rowCount() > 0) {
    foreach($result as $value) {
				$i++;
				
        $processor = $value['processor'];
		$name = $value['name'];
		
		echo "<option value=\"$processor\">$name</option>";
	}
}
?>
			                
			
			               
                </select>
	       
	      </div>
	
	</div>
	
	
	<div class="control-group">
		<label class="control-label" for="input01"></label>
	      <div class="controls">
	       <button type="submit" class="btn btn-inverse" rel="tooltip" title="first tooltip"><?php echo $_L['continue']; ?></button>
	       
	      </div>
	
	</div>
	
	
	   
	  </fieldset>
	</form>
	</div>
    <?php include ('sections/footer.tpl.php'); ?>