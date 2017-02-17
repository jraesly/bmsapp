<?php
$WebsiteTitle = lc('WebsiteTitle');
$footerTxt = lc('footerTxt');
$BrandName = lc('BrandName');
$date_format=lc('SystemDate');
?>
<form action="update.settings<?php echo EXT; ?>" method="post" name="form1" id="form1">
  <fieldset>
    <legend><?php echo $_L['websiteConfig'];?></legend>
    <label><?php echo $_L['websiteTitle'];?></label>
    <input name="websitetitle" type="text" class="span12" id="websitetitle" value="<?php echo $WebsiteTitle; ?>">
    <label><?php echo $_L['brandName'];?></label>
    <input name="brandname" type="text" class="span12" id="brandname" value="<?php echo $BrandName; ?>" maxlength="16">
   <label><?php echo $_L['cpft'];?></label>
    <input name="footertxt" type="text" class="span12" id="footertxt" value="<?php echo $footerTxt; ?>">
   <label><?php echo $_L['date'];?> <?php echo $_L['format'];?></label>
          <label for="lan">Date Format</label>
          <select class="span12 chzn-select" name="system_date" id="system_date">
              <option value="d/m/Y" <?php if($sys_date=='d/m/Y'){echo 'Selected';} ?>>25/03/2015</option>
              <option value="d.m.Y"   <?php if($sys_date=='d.m.Y'){echo 'Selected';} ?>>25.03.2015</option>
              <option value="d-m-Y"   <?php if($sys_date=='d-m-Y'){echo 'Selected';} ?>>25-03-2015</option>
              <option value="m/d/Y"  <?php if($sys_date=='m/d/Y'){echo 'Selected';} ?>>03/25/2015</option>
              <option value="Y/m/d"  <?php if($sys_date=='Y/m/d'){echo 'Selected';} ?>>2015/03/25</option>
              <option value="Y-m-d"   <?php if($sys_date=='Y-m-d'){echo 'Selected';} ?>>2015-03-25</option>
              <option value="M d Y"   <?php if($sys_date=='M d Y'){echo 'Selected';} ?>>Mar 25 2015</option>
              <option value="d M Y"    <?php if($sys_date=='d M Y'){echo 'Selected';} ?>>25 Mar 2015</option>
              <option value="jS M y"   <?php if($sys_date=='jS M y'){echo 'Selected';} ?>>25th Mar 15</option>
          </select>


      <div class="form-actions">
    <input name="action" type="hidden" value="websiteconfig" />
  <button type="submit" class="btn btn-primary"><?php echo $_L['saveChanges'];?></button>
  <button type="reset" class="btn btn-warning"><?php echo $_L['cancel'];?></button>
</div>
  </fieldset>
</form>