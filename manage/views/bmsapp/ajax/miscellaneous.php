<?php
$max = ORM::for_table('invoices')->max('id');
$smax = $max+1;
//exit ("$max");
$query = "SELECT *
FROM  INFORMATION_SCHEMA.TABLES
WHERE TABLE_SCHEMA = '$db_name'
AND   TABLE_NAME   = 'invoices'";
$stmt = $dbh->prepare("$query");
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $value){
$ai = $value['AUTO_INCREMENT'];
}
//var_dump($result);
//exit ("$ai");
?>
<form action="update.settings.php" method="post" name="form1" id="form1">
  <fieldset>
    <legend><?php echo $_L['Miscellaneous'];?></legend>
    <label><?php echo $_L['nis'];?></label>
    <input name="istart" type="text" value="<?php echo $ai; ?>">
   <span class="help-block"><?php echo $_L['ncs'];?>- <?php echo $max; ?></span>
     
    <div class="form-actions">
    <input name="action" type="hidden" value="misc" />
  <button type="submit" class="btn btn-primary"><?php echo $_L['saveChanges'];?></button>
  <button type="reset" class="btn btn-warning"><?php echo $_L['cancel'];?></button>
</div>
  </fieldset>
</form>