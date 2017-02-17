<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
<div class="row-fluid">
<div class="span12">
<?php notify(); ?>
<h4><?php echo $_L['transactions'];?></h4>
<h5><?php echo $_L['Subject'];?>: <?php echo $subject; ?></h5>
<p><?php echo $message; ?></p>
</div>

</div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>