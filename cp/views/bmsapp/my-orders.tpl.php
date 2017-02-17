<?php
$xfooter = '
';
 include ('sections/header.tpl.php'); 
 ?>
 <?php notify(); ?>
    
    <div class="span12">
      <!--Body content-->
      
     
      <table class="table table-striped">
<tr>
    <th><?php echo $_L['s_l']; ?></th>
    <th><?php echo $_L['id']; ?></th>
    <th><?php echo $_L['title']; ?></th>
    <th><?php echo $_L['Date']; ?></th>
    <th width="100px"><?php echo $_L['Status']; ?></th>
  </tr>
<?php
$items = ORM::for_table('orders')->select_many('id', 'pname', 'status')->where('userid',$cid)->order_by_desc('id')->find_many();
$i='0';
foreach ($items as $item) {
	$i++;
	$id = $item['id'];
    $name = $item['pname'];
	$status = $item['status'];
	$ext = EXT;
	echo "<tr>
    <td>$i</td>
    <td>$id</td>
    <td>$name</td>
	<td>$status</td>
    <td><a class=\"btn btn-primary btn-small\" href=\"view$ext?_xClick=$id\">".$_L['view_details']."</a>
     </td>
  </tr>";
}
?>
</table>
    </div>

<?php include ('sections/footer.tpl.php'); ?>


