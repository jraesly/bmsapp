<?php
$xfooter = '	
';
 include ('sections/header.tpl.php'); 
 ?>
 <?php notify(); ?>
    
    <div class="span12">
      <!--Body content-->
      <?php notify(); ?>
     <h4><?php echo $_L['my_emails']; ?></h4>
      <table class="table table-condensed table-hover">
<tr>
    <th><?php echo $_L['s_l']; ?></th>
    <th><?php echo $_L['subject'] ?></th>
    <th><?php echo $_L['date']; ?></th>
    
  </tr>
<?php
if ($tfound>0){
$items = ORM::for_table('email_logs')->raw_query($query)->find_many();

$i='0';
foreach ($items as $item) {
	$i++;
	$id = $item['id'];
    $date = $item['date'];

    $idate=strtotime($date);
    $date=date($sys_date,$idate);

	$subject = $item['subject'];
	$ext = EXT;
	echo "<tr>
    <td>$i</td>
    <td><a href=\"view-email.php?_xClick=$id\">$subject</a></td>
	<td>$date</td>
  </tr>";
}
}
else {
	echo "<tr>
    <td colspan=\"3\">No Emails Found</td>
  </tr>";
}
?>
</table>
<?php  
 echo  $paginate['contents']; 
?> 
    </div>

<?php include ('sections/footer.tpl.php'); ?>


