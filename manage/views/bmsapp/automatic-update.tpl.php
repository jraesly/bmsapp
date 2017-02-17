<?php
$xheader='

';


?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
<div class="row-fluid">
<?php notify(); ?>
<div class="span12">
<form method="post" action="automatic-update.php?_cmd=Run">
<h3>Automatic Update</h3>
<p><?php echo $updates; ?></p>
<?php echo $submittxt; ?>
</form>
</div>
</div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>