<?php
$xfooter = '	
';
 include ('sections/header.tpl.php'); 
 ?>
 <?php notify(); ?>
    
    <div class="span12">
      <!--Body content-->

      <h4><?php echo $_L['my_transactions']; ?></h4>
      <table class="table table-striped">
<tr>
    <th><?php echo $_L['s_l']; ?></th>
    <th><?php echo $_L['id']; ?></th>
    <th><?php echo $_L['title']; ?></th>
    <th><?php echo $_L['from_acc']; ?></th>
    <th><?php echo $_L['to_acc']; ?></th>
    <th><?php echo $_L['amount']; ?></th>
    <th><?php echo $_L['Memo']; ?></th>
    <th><?php echo $_L['status']; ?></th>
  </tr>
<?php
if ($tfound>0){
$items = ORM::for_table('transactions')->raw_query($query)->find_many();
$i='0';
foreach ($items as $item) {
	$i++;
	$id = $item['id'];
    $tfromacc = $item['tfromacc'];
	$ttoacc = $item['ttoacc'];
	$amount = $item['amount'];
	$memo = $item['memo'];
	$date = $item['date'];


    $idate=strtotime($date);
    $date=date($sys_date,$idate);

	$status = $item['status'];
	$ext = EXT;
	echo "<tr>
    <td>$i</td>
    <td>$id</td>
	 <td>$date</td>
    <td>$tfromacc</td>
	<td>$ttoacc</td>
	 <td>$amount</td>
	  <td>$memo</td>
    <td>$status
     </td>
  </tr>";
}
}
?>
</table>
<?php
 echo  $paginate['contents'];
?>
    </div>

<?php include ('sections/footer.tpl.php'); ?>


