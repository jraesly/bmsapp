<?php
$ppemail = lc('paypalemail');
$bankinfo = lc('bankinfo');
?>
<form action="update.settings<?php echo EXT; ?>" method="post" name="form1" id="form1">
  <fieldset>
    <legend><?php echo $_L['pg'];?></legend>
    <label><?php echo $_L['ppe'];?></label>
    <input name="paypal" type="text" value="<?php echo $ppemail; ?>">
    <label><?php echo $_L['offLineBankPayment'];?></label>
    <textarea name="bankinfo" cols="" rows="5"><?php echo $bankinfo; ?></textarea>
    <div class="form-actions">
    <input name="action" type="hidden" value="paymentgw" />
  <button type="submit" class="btn btn-primary"><?php echo $_L['saveChanges'];?></button>
  <button type="reset" class="btn btn-warning"><?php echo $_L['cancel'];?></button>
</div>
  </fieldset>
</form>