<?php
$xfooter = '
';

?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
    <div class="row-fluid">
    <?php notify(); ?>
    </div>
<div class="row-fluid">
<div class="span4 well">
<form method="post" action="administrator-roles.php">
  <fieldset>
    <legend><?php echo $_L['addNewRole'];?></legend>
     <label><?php echo $_L['roleName'];?></label>
    <input name="name" type="text" class="span12" id="name">
     
    <div class="form-actions">
    <input name="action" type="hidden" value="add">
  <button type="submit" name="submit" class="btn btn-primary"><?php echo $_L['submit'];?></button>
  <button type="reset" class="btn"><?php echo $_L['cancel'];?></button>
</div>
  </fieldset>
</form>
</div>
<div class="span8">
<h4><?php echo $_L['aaRole'];?></h4>
<table class="table table-striped">
<tr>
    <th><?php echo $_L['sl'];?></th>
    <th><?php echo $_L['id'];?></th>
    <th><?php echo $_L['roleName'];?></th>
    <th><?php echo $_L['manage'];?></th>
  </tr>
<?php
$count = ORM::for_table('adminroles')->count();
if ($count>0){
$accgroups = ORM::for_table('adminroles')->find_many();
$i='0';
foreach ($accgroups as $accgroup) {
	$i++;
	$id = $accgroup['id'];
    $rname = $accgroup['name'];
	
	echo "<tr>
    <td>$i</td>
    <td>$id</td>
    <td>$rname</td>
    <td><a href=\"edit.roles.php?_cmd=$id\"><i class=\"icon-pencil\"></i></a> 
    <a href=\"delete.roles.php?_cmd=$id\"><i class=\"icon-remove\"></i></a></td>
  </tr>";
}
}
?>
  
</table>

</div>
</div>

    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>