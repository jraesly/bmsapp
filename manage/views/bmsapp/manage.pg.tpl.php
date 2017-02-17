<?php
$cmd = _get('_xClick');
$d = ORM::for_table('paymentgateways')->find_one($cmd);
$name = $d['name'];
$settings = $d['settings'];
$value = $d['value'];
$secret_key = $d['ins'];
$cs = '';
$status = $d['status'];
if ($status=='Active'){
$cs = ' checked="checked"';	
}

?>
<?php
$xheader = '
<link type="text/css" rel="stylesheet" href="../assets/lib/toggle/ui.switchbutton.min.css" />
';
$xfooter = '
<script type="text/javascript" src="../assets/lib/toggle/demo/jquery.tmpl.min.js"></script>
		<script type="text/javascript" src="../assets/lib/toggle/demo/jquery-ui-1.8.16.custom.min.js"></script>
		<script type="text/javascript" src="../assets/lib/toggle/jquery.switchbutton.min.js"></script>
		<script type="text/javascript">
		$(function(){
			
	
	$(".common:checkbox").switchbutton();
		});
		</script>
';
 require ('sections/header.tpl.php'); ?>
    <div class="container">
    <div class="row-fluid">
    <?php notify(); ?>
    </div>
    <div class="row-fluid">
    <form action="update.settings.php" method="post" name="form1" id="form1">
  <fieldset>
    <legend><?php echo $name; ?></legend>
    <label><?php echo $_L['name'];?></label>
    <input name="pgname" type="text" disabled value="<?php echo $name; ?>">
    <label><?php echo $_L['Setting_name'];?></label>
    <input name="settings" type="text" disabled value="<?php echo $settings; ?>">
    <label><?php echo $_L['value'];?></label>
    
    <textarea name="value" rows="6" class="input-xxlarge"><?php echo $value; ?></textarea>

      <?php
      if($name=='Stripe'){
            ?>
          <label>Secret key</label>

          <textarea name="secret_key" rows="6" class="input-xxlarge"><?php echo $secret_key; ?></textarea>

      <?php
      }
      ?>

      <label><?php echo $_L['status'];?></label>
    <input name="status" type="checkbox" class="common" id="switch1" value="Active" <?php echo $cs; ?> />
    <div class="form-actions">
    <input name="action" type="hidden" value="paymentgw" />
     <input name="id" type="hidden" value="<?php echo $cmd; ?>" />
  <button type="submit" class="btn btn-primary"><?php echo $_L['saveChanges'];?></button>
  <a href="payment-gateways.php" class="btn btn-warning"><?php echo $_L['cancel'];?></a>
</div>
  </fieldset>
</form>
    </div>

   </div><!-- /container -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/common.js"></script>
 <?php echo $xfooter; ?>
  </body>
</html>
