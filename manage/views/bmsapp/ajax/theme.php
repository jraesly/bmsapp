<?php
$gTheme =  lc('theme');
?>
<form action="update.settings<?php echo EXT; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <fieldset>
    <legend><?php echo $_L['localization'];?></legend>
    <label><strong><?php echo $_L['cureentAdminTheme'];?></strong></label>
     <img src="views/<?php echo $gat; ?>/_theme-preview.jpg" class="img-polaroid">
    <label><?php echo $_L['availableTheme'];?></label>
    <select>
  <?php
if ($handle = opendir('views')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
			 if($gat==$entry){$selected = "selected=\"selected\""; }
			 else {
				 $selected="";
			 }
            echo "<option value=\"$entry\" 
             
            $selected
            >$entry</option>";
            //echo "$entry\n";
        }
    }
    closedir($handle);
}
?>
</select>
<label><strong><?php echo $_L['current_client_theme'];?></strong></label>
   
    <img src="../cp/views/<?php echo $gTheme; ?>/_theme-preview.jpg" class="img-polaroid">
    <label><?php echo $_L['Available_Theme'];?></label>
    <select name="theme">
  <?php
if ($handle = opendir('../cp/views')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
			 if($gTheme==$entry){$selected = "selected=\"selected\""; }
			 else {
				 $selected="";
			 }
            echo "<option value=\"$entry\" 
             
            $selected
            >$entry</option>";
           
        }
    }
    closedir($handle);
}
?>
</select>
    <div class="form-actions">
    <input name="action" type="hidden" value="localization" />
  <button type="submit" class="btn btn-primary"><?php echo $_L['save_changes'];?></button>
  <button type="reset" class="btn btn-warning"><?php echo $_L['cancel'];?></button>
</div>
  </fieldset>
</form>