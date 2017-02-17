<?php
$xfooter = '	
';
 include ('sections/header.tpl.php'); 
 ?>
 <?php notify(); ?>
    
    <div class="span12">
      <!--Body content-->
      <h5>Date Sent: <?php echo $sdate; ?></h5>
     <h5>Subject: <?php echo $subj; ?></h5>
     <?php echo $msg; ?>
      
    </div>

<?php include ('sections/footer.tpl.php'); ?>


