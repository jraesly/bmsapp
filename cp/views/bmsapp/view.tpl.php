<?php

 include ('sections/header.tpl.php'); 
 ?>
   <div class="span12 well">
<h4><?php echo $pname; ?></h4>
<h4><?php echo $_L['Order_Number']; ?>- <?php echo $ordernum; ?></h4>
            <p>
            

            <strong><?php echo $_L['Order_Date']; ?>: </strong> <?php echo $date; ?>
            
            <br>
<strong><?php echo $_L['Order_Status']; ?>: </strong> <?php echo $sttxt; ?>
            
            <br>
<strong><?php echo $_L['Invoice'];?>: </strong> <?php echo $invoiceid; ?>
            
            <br>

            <strong><?php echo $_L['IP']; ?>: </strong> <?php echo $ipaddress; ?>
            
            <br>
            
            </p>
            <h4><?php echo $_L['activation_message']; ?></h4>
            
            <div class="alert  alert-success alert-block">
 
  <p><?php echo $notes; ?></p>
</div>
	
	</div>
    <?php include ('sections/footer.tpl.php'); ?>