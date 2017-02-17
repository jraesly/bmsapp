<?php
$xheader = '
<link href="../assets/lib/charts/assets/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/lib/tablecloth/assets/css/tablecloth.css">

';
$xfooter = '
		<script src="../assets/lib/tablecloth/assets/js/jquery.tablecloth.js"></script>
		
		<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    
    $("#activity").tablecloth({
      theme:"paper",
      striped:true
    });
    
  });
</script>


		
';

 require ('sections/header.tpl.php');
  ?>
<div class="container">
<div class="row-fluid">
<div class="span12">
        <table id="activity">
          <thead>
            <tr>
              <th colspan="5"><?php echo $_L['systemLog'];?></th>
            </tr>
            <tr>
              <th><?php echo $_L['id'];?></th>
              <th><?php echo $_L['date'];?></th>
              <th><?php echo $_L['type'];?></th>
              <th><?php echo $_L['description'];?></th>
              <th><?php echo $_L['ip'];?></th>
            </tr>
          </thead>
          <tbody>
          <?php
		   if ($tfound>0){
		  $tr = ORM::for_table('logs')->raw_query($query)->find_many();
foreach ($tr as $trs) {
    $id = $trs['id'];
	$date = $trs['date'];

    $idate=strtotime($date);
    $date=date($sys_date,$idate);

	$type = $trs['type'];
	$description = $trs['description'];
	$ip = $trs['ip'];
	echo "<tr>
              <td>$id</td>
              <td>$date</td>
              <td>$type</td>
              <td>$description</td>
              <td>$ip</td>
            </tr>";
	
}
		   }
		  
		  ?>
          </tbody>
        </table>
        <?php  
 echo  $paginate['contents']; 
?> 
      </div>

</div>		
</div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>
