<?php
$d = ORM::for_table('admins')->find_one($aid);
?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
    <div class="row-fluid">
    <?php notify(); ?>
    </div>
<div class="span12">
<!--<p><a href="manage.pg.php?_xClick=1" class="btn btn-primary">Add New Payment Gateway</a></p>-->


<table class="table">
  <tr>
    <th><?php echo $_L['name'];?></th>
    <th><?php echo $_L['settings'];?></th>
    <th><?php echo $_L['value'];?></th>
    <th><?php echo $_L['status'];?></th>
    <th><?php echo $_L['manage'];?></th>
  </tr>
  <?php
  $query = 'select *from paymentgateways';
 $items = ORM::for_table('paymentgateways')->raw_query($query)->find_many();
$i='0';
foreach ($items as $item) {
	$i++;
	$id = $item['id'];
$name = $item['name'];
$settings = $item['settings'];
$value = $item['value'];
$status = $item['status'];
echo '<tr>
    <td>'.$name.'</td>
    <td>'.$settings.'</td>
    <td>'.$value.'</td>
    <td>'.$status.'</td>
    <td><a href="manage.pg.php?_xClick='.$id.'" class="btn btn-primary">Configure</a></td>
  </tr>';


}
  ?>
 
</table>

</div>

    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>