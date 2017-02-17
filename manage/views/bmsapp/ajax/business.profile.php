<?php
$company = lc('CompanyName');
$email = lc('Email');
$appurl = lc('sysUrl');
$caddress = lc('caddress');
?>
<form action="update.settings<?php echo EXT; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <fieldset>
    <legend><?php echo $_L['businessProfile'];?></legend>
    <label><?php echo $_L['companyName'];?></label>
    <input name="company" type="text" value="<?php echo $company; ?>">
    <span class="help-block"><?php echo $_L['compnayNameAs'];?></span>
    <label><?php echo $_L['defaultEmailAddress'];?></label>
    <input name="email" type="text" id="email" value="<?php echo $email; ?>">
    <span class="help-block"><?php echo $_L['emailSysD'];?></span>
    <label><?php echo $_L['currentBusinessLogo'];?></label>
     <span class="help-block"><img src="../assets/uploads/logo.png"/></span>
     <label><?php echo $_L['updateLogo'];?></label>
    <input type="file" name="file" id="file">
    <span class="help-block"><?php echo $_L['dddd'];?><br />
    <strong><?php echo $_L['eee'];?></strong>
</span>
    <label><?php echo $_L['payToAddress'];?></label>
    <textarea name="caddress" rows="5" id="caddress"><?php echo $caddress; ?></textarea>
    <span class="help-block"><?php echo $_L['dummy'];?></span>
    <label><?php echo $_L['applicationUrl'];?></label>
    <input name="appurl" type="text" id="appurl" value="<?php echo $appurl; ?>">
    <span class="help-block"><?php echo $_L['theUrl'];?></span>
    <div class="form-actions">
    <input name="action" type="hidden" value="business-profile" />
  <button type="submit" class="btn btn-primary"><?php echo $_L['saveChanges'];?></button>
  <button type="reset" class="btn btn-warning"><?php echo $_L['cancel'];?></button>
</div>
  </fieldset>
</form>