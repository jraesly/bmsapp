<?php
$xfooter = '	
';
 include ('sections/header.tpl.php'); 
 ?>
 <?php notify(); ?>
    
    <div class="span12">
      <!--Body content-->
      
     <h4>My Tickets</h4>
      <table class="table table-condensed table-hover">
<tr>
    <th><?php echo $_L['s_l']; ?></th>
    <th><?php echo $_L['last_responder'] ?></th>
     <th>&nbsp;</th>
    <th><?php echo $_L['subject'] ?></th>
    <th><?php echo $_L['Date']; ?></th>
    
  </tr>
<?php
$cnt = ORM::for_table('tickets')->where('userid', $cid)->count();
if ($cnt>0){

$items = ORM::for_table('tickets')->raw_query($query)->find_many();
$i='0';
foreach ($items as $item) {
	$i++;
	$id = $item['id'];
    $date = $item['date'];


    $idate=strtotime($date);
    $date=date($sys_date,$idate);

	$subject = $item['subject'];
	$status = $item['status'];
	$replyby = $item['replyby'];
	$ext = EXT;
	echo "<tr>
    <td>$i</td>
    <td>$replyby</td>
	 <td><span class=\"label pull-right\">$status</span></td>
    <td><a href=\"view-ticket$ext?_xClick=$id\">$subject</a></td>
	<td>$date</td>
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


