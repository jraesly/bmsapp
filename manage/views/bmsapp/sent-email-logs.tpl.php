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
              <th colspan="4"><?php echo $_L['emailLog'];?></th>
            </tr>
            <tr>
              <th><?php echo $_L['id'];?></th>
              <th><?php echo $_L['email'];?></th>
              <th><?php echo $_L['subject'];?></th>
              <th><?php echo $_L['date'];?></th>
             
            </tr>
          </thead>
          <tbody>
          <?php
		  $ext = EXT;
		   if ($tfound>0){
		  $tr = ORM::for_table('email_logs')->raw_query($query)->find_many();
foreach ($tr as $trs) {
    $id = $trs['id'];
	$date = $trs['date'];
	$subject = $trs['subject'];
	$email = $trs['email'];
	//$ip = $trs['ip'];
	echo "<tr>
              <td>$id</td>
              <td>$email</td>
              <td><a href=\"view-email$ext?_xClick=$id\">$subject</a></td>
              <td>$date</td>
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