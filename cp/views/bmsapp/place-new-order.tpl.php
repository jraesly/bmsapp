<?php
$xfooter = '<script>
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
 require ('sections/header.b4login.tpl.php'); ?>    
    <div class="span12">
      <!--Body content-->
         
    <div class="span12">
      <!--Body content-->
      
     
      <table class="table table-striped">
<tr>
    <th>S/L</th>
    <th>ID</th>
    <th>Title</th>
    <th>Price</th>
    <th width="100px">Manage <img id="ajxspin" src='../assets/img/blue_spinner.gif'/></th>
  </tr>
<?php
$items = ORM::for_table('products')->where('status', 'Show')->select_many('id', 'name', 'price')->order_by_desc('id')->find_many();
$i='0';
foreach ($items as $item) {
	$i++;
	$id = $item['id'];
    $name = $item['name'];
	$price = $item['price'];
	$ext = EXT;
	echo "<tr>
    <td>$i</td>
    <td>$id</td>
    <td>$name</td>
	<td>$price</td>
    <td><a class=\"btn btn-primary btn-small\" href=\"view-details$ext?_cmd=$id\">View Details</a>
    </td>
  </tr>";
}
?>
</table>
    </div> 
     
    </div>

 <?php require ('sections/footer.tpl.php'); ?>

