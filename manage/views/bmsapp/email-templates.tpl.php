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
              <th colspan="4"><?php echo $_L['emailTemplate'];?></th>
            </tr>
            <tr>
              <th><?php echo $_L['id'];?></th>
              <th><?php echo $_L['templateName'];?></th>
              <th><?php echo $_L['subject'];?></th>
              <th><?php echo $_L['manage'];?></th>
             
            </tr>
          </thead>
          <tbody>
          <?php
		  $ext = EXT;
		   if ($tfound>0){
		  $tr = ORM::for_table('email_templates')->raw_query($query)->find_many();
foreach ($tr as $trs) {
    $id = $trs['id'];
	$tplname = $trs['tplname'];
	$subject = $trs['subject'];
	
	//$ip = $trs['ip'];
	echo "<tr>
              <td>$id</td>
              <td>$tplname</td>
              <td><a href=\"view.email-template.php?_xClick=$id\">$subject</a></td>
              <td><a href=\"view.email-template.php?_xClick=$id\" class=\"btn btn-primary\">
			  <i class=\"icon-edit icon-white\"></i> Manage</a></td>
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