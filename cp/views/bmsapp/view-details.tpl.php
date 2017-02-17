<?php require ('sections/header.b4login.tpl.php'); ?>    
     <div class="span12">


	<form class="form-horizontal" id="buy" method='post' action='login.php?_after=buy.php?_cmd=<?php echo $trid; ?>'>
	  <fieldset>
	    <legend><?php echo $trd['name']; ?></legend>
        <p>
        <?php echo $trd['description']; ?>
        
        </p>
	    <h3>Price: <?php echo lc('defaultcurrencysymbol').' '. $trd['price']; ?></h3>
	    <div class="control-group">
	      <label class="control-label" for="input01">Payment Method</label>
	      <div class="controls">
	        <select name="pmethod" id="pmethod" >
            				
			              <?php
						  $d= ORM::for_table('paymentgateways')->where('status', 'Active')->find_many();
						  foreach ($d as $di) {
							  $processor = $di['processor'];
							  $name = $di['name'];

echo "<option value=\"$processor\">$name</option>";

						  }

						  
						  ?>
			
			               
                </select>
	       
	      </div>
	
	</div>
	
	
	<div class="control-group">
		<label class="control-label" for="input01"></label>
	      <div class="controls">
	       <button type="submit" class="btn btn-inverse" rel="tooltip" title="first tooltip">Continue</button>
	       
	      </div>
	
	</div>
	
	
	   
	  </fieldset>
	</form>
	</div>

 <?php require ('sections/footer.tpl.php'); ?>

