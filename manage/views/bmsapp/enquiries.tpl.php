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
              <th colspan="4">All Enquiries / Pre-Sales Contact Us</th>
            </tr>
            <tr>
              <th>ID</th>
              <th>Email</th>
              <th>Subject</th>
              <th>Date</th>
             
            </tr>
          </thead>
          <tbody>
          <?php
		  $ext = EXT;
		   if ($tfound>0){
		  $tr = ORM::for_table('enquiries')->raw_query($query)->find_many();
foreach ($tr as $trs) {
    $id = $trs['id'];
	$date = $trs['date'];

    $idate=strtotime($date);
    $date=date($sys_date,$idate);

	$subject = $trs['subject'];
	$email = $trs['email'];
	//$ip = $trs['ip'];
	echo "<tr>
              <td>$id</td>
              <td>$email</td>
              <td><a href=\"view-enquiries.php?_xClick=$id\">$subject</a></td>
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