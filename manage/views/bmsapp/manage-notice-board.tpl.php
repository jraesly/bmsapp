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
<?php notify(); ?>
<a href="notice-board.php" class="btn btn-warning"><i class="icon-pencil icon-white"></i> Post New</a>
        <table id="activity">
          <thead>
            <tr>
              <th colspan="4">Notice Board</th>
            </tr>
            <tr>
              <th>ID</th>
              <th>Posted By</th>
              <th width="70%">Message</th>
              <th>Date</th>
             
            </tr>
          </thead>
          <tbody>
          <?php
		  $ext = EXT;
		   if ($tfound>0){
		  $tr = ORM::for_table('message_board')->raw_query($query)->find_many();
foreach ($tr as $trs) {
    $id = $trs['id'];
	$name = $trs['name'];
	$message = $trs['message'];
	
	echo "<tr>
              <td>$id</td>
              <td>$name</td>
              <td>$message</td>
              <td><a href=\"delete.notice.php?_cmd=$id\" class=\"btn btn-danger\"><i class=\"icon-trash icon-white\"></i> Delete</a></td>
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