<?php
$eid=(int) $req_params['1'];
$email=findOne('email_logs',$eid);

?>
<div class="alert alert-success">
 <p><strong><?php echo $_L['dateSent'];?>: <?php echo $email['date']; ?></strong>

             </p>
</div>
<div class="alert alert-success">
 <p><strong><?php echo $_L['cpft'];?> <?php echo $email['subject']; ?></strong>

             </p>
</div>
<div class="well">
              
             <?php echo $email['message']; ?>
             
              
</div>
