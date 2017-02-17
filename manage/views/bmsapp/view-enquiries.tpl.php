
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
<div class="row-fluid">
<div class="span12">
<?php notify(); ?>
<a href="enquiries.php" class="btn btn-primary">Back To The List</a>
<hr>
<h4>From: <?php echo $d['email']; ?></h4>
<hr>
<h4><?php echo $d['subject']; ?></h4>
<hr>
<p>
<?php echo $d['message']; ?>
</p>
<p>
</p>
<hr>
<p>
<?php echo $d['ip']; ?>
</p>
<hr>
</div>
</div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>