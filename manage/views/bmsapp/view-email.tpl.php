
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
<div class="row-fluid">
<div class="span12">
<?php notify(); ?>
<h5><?php echo $_L['To'];?>: <?php echo $sent_to; ?></h5>
<h5><?php echo $_L['Date_Sent'];?>: <?php echo $dtsent; ?></h5>
<h5><?php echo $_L['Subject'];?>: <?php echo $subject; ?></h5>
 <?php echo $msgbody; ?>
</div>
</div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>