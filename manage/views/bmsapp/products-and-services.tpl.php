<?php
$xheader='
<link rel="stylesheet" href="../lib/pnp/redactor/redactor/redactor.css" />
';
$xfooter = '
<script src="../lib/pnp/redactor/redactor/redactor.min.js"></script>

	<script type="text/javascript">
	$(document).ready(
		function()
		{
			$(\'#redactor_content\').redactor({
				imageUpload: \'image_upload.php\',
				minHeight: 200 // pixels

			});
		}
	);
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
});</script>

	
';

?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
    <div class="row-fluid">
    <?php notify(); ?>
    </div>
<div class="row-fluid">
<div class="span12 well">
<form method="post" action="products-and-services.php">
  <fieldset>
    <legend><?php echo $_L['addproduct/service'];?></legend>
    <label><?php echo $_L['pst'];?></label>
    <input name="title" type="text" class="input-xxlarge" id="title">
    <label><?php echo $_L['detail/service'];?></label>
    <textarea rows="5" name="description"  id="redactor_content" class="input-block-level"></textarea>
    <label><?php echo $_L['price'];?></label>
    <input name="price" type="text" class="input-small" id="price">
     <label><?php echo $_L['showClientPortal'];?></label>
    <input name="status" type="checkbox" class="common" id="switch1" value="Active" checked="checked" />
    <div class="form-actions">
  <button type="submit" name="submit" class="btn btn-primary"><?php echo $_L['submit'];?></button>
  <button type="reset" class="btn"><?php echo $_L['cancel'];?></button>
</div>
  </fieldset>
</form>
</div>
</div>
<div class="row-fluid">
<div class="span12">
<h4><?php echo $_L['lps'];?></h4>
<table class="table table-striped">
<tr>
    <th><?php echo $_L['sl'];?></th>
    <th><?php echo $_L['id'];?></th>
    <th><?php echo $_L['title'];?></th>
    <th><?php echo $_L['price'];?></th>
    <th><?php echo $_L['manage'];?> <img id="ajxspin" src='../assets/img/blue_spinner.gif'/></th>
  </tr>
<?php
$items = ORM::for_table('products')->select_many('id', 'name', 'price')->order_by_desc('id')->find_many();
$i='0';
foreach ($items as $item) {
	$i++;
	$id = $item['id'];
    $name = $item['name'];
	$price = $item['price'];
	echo "<tr>
    <td>$i</td>
    <td>$id</td>
    <td>$name</td>
	<td>$price</td>
    <td><a href=\"views/bmsapp/ajax/edit.pns.php?_cmd=$id\" data-toggle=\"modal\"><i class=\"icon-pencil\"></i></a> 
    <a href=\"views/bmsapp/ajax/delete.pns.php?_cmd=$id\" data-toggle=\"modal\"><i class=\"icon-remove\"></i></a></td>
  </tr>";
}
?>
</table>

</div>
</div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>