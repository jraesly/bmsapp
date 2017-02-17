<?php
$xheader='
';
$xfooter = '
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
<form method="post" action="client-groups<?php echo EXT; ?>">
  <fieldset>
    <legend><?php echo $_L['addNewGroup']; ?></legend>
    <label><?php echo $_L['groupName']; ?></label>
    <input name="groupname" type="text" class="input-xlarge" id="title">
    <div class="form-actions">
    <input name="action" type="hidden" value="add">
  <button type="submit" name="submit" class="btn btn-primary"><?php echo $_L['submit']; ?></button>
  <button type="reset" class="btn"><?php echo $_L['cancel']; ?></button>
</div>
  </fieldset>
</form>
</div>
<div class="span8">
<h4><?php echo $_L['clientGroup'];?></h4>
<table class="table table-striped">
<tr>
    <th><?php echo $_L['sl'];?></th>
    <th><?php echo $_L['id'];?></th>
    <th><?php echo $_L['groupName'];?></th>
    <th><?php echo $_L['manage'];?> <img id="ajxspin" src='../assets/img/blue_spinner.gif'/></th>
  </tr>
<?php
$accgroups = ORM::for_table('accgroups')->order_by_desc('id')->find_many();
$i='0';
foreach ($accgroups as $accgroup) {
	$i++;
	$id = $accgroup['id'];
    $name = $accgroup['groupname'];
	
	echo "<tr>
    <td>$i</td>
    <td>$id</td>
    <td>$name</td>
    <td><a href=\"views/bmsapp/ajax/edit.group.php?_cmd=$id\" data-toggle=\"modal\"><i class=\"icon-pencil\"></i></a> 
    <a href=\"views/bmsapp/ajax/delete.group.php?_cmd=$id\" data-toggle=\"modal\"><i class=\"icon-remove\"></i></a></td>
  </tr>";
}
?>
  
</table>

</div>
</div>

    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>