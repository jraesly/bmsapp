<?php
$d = ORM::for_table('taxes')->find_one('1');
$tname = $d['name'];
$trate = $d['rate'];
$ttype = $d['type'];
$taxacc = $d['taxacc'];
?>
<form action="update.settings<?php echo EXT; ?>" method="post" name="form1" id="form1">
  <fieldset>
    <legend><?php echo $_L['taxVat'];?></legend>
    <label><?php echo $_L['name'];?></label>
    <input name="tname" type="text" value="<?php echo $tname; ?>">
    <label><?php echo $_L['rate'];?></label>
    <div class="input-append">
  <input class="span1" name="trate" value="<?php echo $trate; ?>" type="text">
  <span class="add-on">%</span>
</div>
    <label><?php echo $_L['type'];?></label>
    <select name="ttype" class="chzn-select" tabindex="2">
      <option value="Excluded" <?php if ($ttype=='Excluded') echo 'selected="selected"';  ?>><?php echo $_L['Exclusive'];?></option>
      <option value="Included" <?php if ($ttype=='Included') echo 'selected="selected"';  ?>><?php echo $_L['Inclusive'];?></option>
    </select>
    <label><?php echo $_L['taxVat'];?> <?php echo $_L['account'];?></label>
     <select name="taxacc"  data-placeholder="Choose an Account" id="trfrom" class="chzn-select" tabindex="2">
                    <option value=""><?php echo $_L['chooseAccount'];?></option>
                     <?php
$query = "SELECT id, name from accounts where acctype='TAX' ORDER BY id ASC";
$stmt = $dbh->prepare("$query");
$stmt->execute();
$result = $stmt->fetchAll();
$i="0";
$ext = EXT;
if ($stmt->rowCount() > 0) {
    foreach($result as $value) {
				$i++;
				
        $id = $value['id'];
		$name = $value['name'];
		$scode='';
		if ($taxacc==$id){
			$scode='selected="selected"';
		}
		
		echo "<option value=\"$id\" $scode>$name $company</option>";
	}
}
?>
                </select>
    <div class="form-actions">
    <input name="action" type="hidden" value="tax-vat" />
  <button type="submit" class="btn btn-primary"><?php echo $_L['saveChanges'];?></button>
  <button type="reset" class="btn btn-warning"><?php echo $_L['cancel'];?></button>
</div>
  </fieldset>
</form>
<?php echo '<script src="../assets/lib/chosen/chosen.jquery.js" type="text/javascript"></script>
  <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>'; ?>