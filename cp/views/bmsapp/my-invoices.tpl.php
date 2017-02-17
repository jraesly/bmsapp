<?php
$xfooter = '	
';
 include ('sections/header.tpl.php'); 
 ?>
 <?php notify(); ?>
    
    <div class="span12">
      <!--Body content-->
      
     <h4><?php echo $_L['my_invoices']; ?></h4>
      <table class="table table-striped">
<tr>
    <th><?php echo $_L['s_l']; ?></th>
    <th><?php echo $_L['id']; ?></th>
    <th><?php echo $_L['created']; ?></th>
    <th><?php echo $_L['due_date']; ?></th>
    <th><?php echo $_L['amount']; ?></th>
    <th><?php echo $_L['status']; ?></th>
    <th><?php echo $_L['manage']; ?></th>
  </tr>
<?php
$cnt = ORM::for_table('invoices')->where('userid', $cid)->count();
if ($cnt>0){


$items = ORM::for_table('invoices')->raw_query($query)->find_many();
$i='0';
foreach ($items as $item) {
	$i++;
	$id = $item['id'];
    $created = $item['created'];
	$duedate = $item['duedate'];

    $cdate=strtotime($created);
    $created=date($sys_date,$cdate);

    $ddate=strtotime($duedate);
    $duedate=date($sys_date,$ddate);



    $amount = $item['total'];
	$status = $item['status'];
	if ($status=='Unpaid'){
			$st="<a class=\"btn btn-danger btn-small\" href=\"invoice$ext?_cmd=$id\">".$_L['pay_now']."</a>";
		}
		else {
		$st="<a class=\"btn btn-primary btn-small\" href=\"invoice$ext?_cmd=$id\">".$_L['view']."</a>";
		}
	$ext = EXT;
	echo "<tr>
    <td>$i</td>
    <td>$id</td>
	 <td>$created</td>
    <td>$duedate</td>
	<td>$amount</td>
	 <td>$status</td>
	  <td>$st</td>
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


