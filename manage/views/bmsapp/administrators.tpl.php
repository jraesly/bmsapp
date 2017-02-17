<?php

$xheader='
<link rel="stylesheet" href="../assets/lib/chosen/chosen.css" />
';
$xfooter = '
<script src="../assets/lib/chosen/chosen.jquery.js" type="text/javascript"></script>

  <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); 
 
  </script>

<script>
$(\'#ajxspin\').css(\'visibility\',\'hidden\');
				$(\'[data-toggle="modal"]\').click(function(e) {
	e.preventDefault();
	$(\'#ajxspin\').css(\'visibility\',\'visible\');
	var url = $(this).attr(\'href\');
	if (url.indexOf(\'#\') == 0) {
		$(url).modal(\'open\');
	} else {
		$.get(url, function(data) {
			$(\'<div class="modal hide fade">\' + data + \'</div>\').modal();
		}).success(function() {
			$(\'#ajxspin\').css(\'visibility\',\'hidden\');
			 });
	}
});
</script>
';

?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
    <div class="row-fluid">
    <?php notify(); ?>
    </div>
<div class="row-fluid">
<div class="span4 well">
<form method="post" action="administrators<?php echo EXT; ?>">
  <fieldset>
    <legend><?php echo $_L['addNewAddministrator'];?></legend>
     <label><?php echo $_L['firstName'];?></label>
    <input name="fname" type="text" class="span12" id="fname">
     <label><?php echo $_L['lastName'];?></label>
    <input name="lname" type="text" class="span12" id="lname">
    <label><?php echo $_L['email'];?></label>
    <input name="email" type="text" class="span12" id="email">
    <label><?php echo $_L['userName'];?></label>
    <input name="username" type="text" class="span12" id="username">
    <label><?php echo $_L['password'];?></label>
    <input name="password" type="password" class="span12" id="password">
    <label><?php echo $_L['role'];?></label>
    <select  name="roleid" class="span12 chzn-select" tabindex="2">
   <?php
		  $accgroups = ORM::for_table('adminroles')->find_many();

foreach ($accgroups as $accgroup) {
	$id = $accgroup['id'];
    $name = $accgroup['name'];
	
	echo "<option value=\"$id\">$name</option>";
}
		  
		  ?>
 
</select>
    <div class="form-actions">
    <input name="action" type="hidden" value="add">
  <button type="submit" name="submit" class="btn btn-primary"><?php echo $_L['submit'];?></button>
  <button type="reset" class="btn"><?php echo $_L['cancel'];?></button>
</div>
  </fieldset>
</form>
</div>
<div class="span8">
<h4><?php echo $_L['addministrator'];?></h4>
<table class="table table-striped">
<tr>
    <th><?php echo $_L['sl'];?></th>
    <th><?php echo $_L['id'];?></th>
    <th><?php echo $_L['userName'];?></th>
    <th><?php echo $_L['manage'];?> <img id="ajxspin" src='../assets/img/blue_spinner.gif'/></th>
  </tr>
<?php
$count = ORM::for_table('admins')->count();
if ($count>0){
$accgroups = ORM::for_table('admins')->where_not_equal('username','admin')->order_by_desc('id')->find_many();
$i='0';
foreach ($accgroups as $accgroup) {
	$i++;
	$id = $accgroup['id'];
    $name = $accgroup['username'];
	
	echo "<tr>
    <td>$i</td>
    <td>$id</td>
    <td>$name</td>
    <td><a href=\"views/bmsapp/ajax/edit.admin.php?_cmd=$id\" data-toggle=\"modal\"><i class=\"icon-pencil\"></i></a> 
    <a href=\"views/bmsapp/ajax/delete.admin.php?_cmd=$id\" data-toggle=\"modal\"><i class=\"icon-remove\"></i></a></td>
  </tr>";
}
}
?>
  
</table>

</div>
</div>

    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>