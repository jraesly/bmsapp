<?php
$sysurl = lc('sysUrl');

?>
<form action="update.settings.php" method="post" name="form1" id="form1">
  <fieldset>
    <legend><?php echo $_L['automation'];?></legend>
    <label><?php echo $_L['createCornJob'];?></label>
    <input name="istart" type="text" class="input-xxlarge" value="GET <?php echo $sysurl; ?>/manage/cron.php">
   
     
    <div class="form-actions">
  <span class="help-block"><?php echo $_L['setupCronJob'];?></span>
</div>
  </fieldset>
</form>