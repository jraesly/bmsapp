<?php
$xheader='<link rel="stylesheet" type="text/css" href="../assets/lib/datatable/dt-bootstrap.css">
<link rel="stylesheet" href="../assets/lib/chosen/chosen.css" />
'
;
$xfooter='<script type="text/javascript" language="javascript" src="../assets/lib/datatable/jquery.dataTables.min.js"></script>
<script src="../assets/lib/datatable/dt-bootstrap.js"></script>
 <script src="../assets/lib/chosen/chosen.jquery.js" type="text/javascript"></script>
  <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
  
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				oTable = $(\'#data\').dataTable({
					"bPaginate": false,
					"bInfo":false,
					 "aaSorting": [[ 1, "desc" ]]
					
					
				});
				$(\'#loading\').css(\'visibility\',\'hidden\');
				$(\'[data-toggle="modal"]\').click(function(e) {
	e.preventDefault();
	$(\'#loading\').css(\'visibility\',\'visible\');
	var url = $(this).attr(\'href\');
	if (url.indexOf(\'#\') == 0) {
		$(url).modal(\'open\');
	} else {
		$.get(url, function(data) {
			$(\'<div class="modal hide fade">\' + data + \'</div>\').modal();
		}).success(function() {
			$(\'#loading\').css(\'visibility\',\'hidden\');
			 });
	}
});
	
			} );
			$(function(){
      // bind change event to select
      $(\'#cfilter\').bind(\'change\', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });	
		
		</script>

		
		';
require ('sections/header.tpl.php');

?>
    <div class="container">


<!-- Masthead
================================================== -->

  <div class="row">
    
    
   <?php notify(); ?>
  </div>
  <div class="row">
  
    <div class="span2">
    <div id="loading" class="pagination-centered">
      <img  src="../assets/img/loader-blue.gif" alt="loading" />
    </div>
   
    <h2><?php echo $_L['orders'];?></h2>
     <a href="products-and-services<?php echo EXT; ?>" class="btn btn-primary btn-block"><i class="icon-plus icon-white"></i><?php echo $_L['manageProducts'];?></a>
 <hr>
   <h5>Total <?php echo $paginate['found']; ?> Orders Found. Showing Page <?php echo $fpage;?> of <?php echo $lpage; ?></h5>  
   <hr>
    <a href="make<?php echo EXT; ?>?_what=csv&amp;__use__=<?php _encode($query); ?>" class="btn btn-primary btn-block"><i class="icon-list icon-white"></i> <?php echo $_L['exportCSV'];?></a>
    </div>
    <div class="span10">
      <div  id="accounts-data">
<table class="footable" id="data">
      <thead>
        <tr>
          <th colspan="9" align="left"><select name="accounts" id="cfilter"  data-placeholder="Choose a Category..." class="chzn-select" tabindex="2">
          <option value="?_filter=_blank" <?php if ($filter=='_blank') echo 'selected="selected"';  ?>><?php echo $_L['allOrders'];?></option>
  <option value="?_filter=Pending" <?php if ($filter=='Pending') echo 'selected="selected"';  ?>><?php echo $_L['pendings'];?></option>
   <option value="?_filter=Processing" <?php if ($filter=='Processing') echo 'selected="selected"';  ?>><?php echo $_L['inProgress'];?></option>
  <option value="?_filter=Active" <?php if ($filter=='Active') echo 'selected="selected"';  ?>><?php echo $_L['active'];?></option>
  <option value="?_filter=Fraud" <?php if ($filter=='Fraud') echo 'selected="selected"';  ?>><?php echo $_L['fraud'];?></option>
  <option value="?_filter=Cancelled" <?php if ($filter=='Cancelled') echo 'selected="selected"';  ?>><?php echo $_L['cancelled'];?></option>
</select>


</th>
          </tr>
        <tr>
        
          <th>
<?php echo $_L['sl'];?>          </th>
           <th>
<?php echo $_L['id'];?>          </th>
          <th>
<?php echo $_L['clientName'];?>            </th>
         
           <th><?php echo $_L['pid'];?>  </th>
           <th><?php echo $_L['invoice_'];?>  </th>
           <th><?php echo $_L['amount'];?>  </th>
          
          <th>
<?php echo $_L['order_'];?>            </th>
          <th>
<?php echo $_L['date'];?>          </th>
          <th>
<?php echo $_L['manage'];?>          </th>
        </tr>
      </thead>
      <tbody>
          <?php
$stmt = $dbh->prepare("$query");

$stmt->execute();
$result = $stmt->fetchAll();
$i="0";
$ext = EXT;
if ($stmt->rowCount() > 0) {
    foreach($result as $value) {
				$i++;
				
        $id = $value['id'];
		$userid = $value['name'];
		
		$date = $value['date'];

        $idate=strtotime($date);
        $date=date($sys_date,$idate);

		$ordernum = $value['ordernum'];
		$invoiceid = $value['invoiceid'];
		$amount=$value['amount'];
		$pid=$value['pid'];
		
		echo "<tr  class=\"gradeA\">
        
          <td>$i</td><td>$id
          </td><td>$userid
          </td><td>$pid</td><td><a href=\"invoice$ext?_show=$invoiceid\">$invoiceid</a></td><td>$amount</td>
          <td>$ordernum
          </td>
		  <td>$date</td>
		  <td><a href=\"order$ext?_show=$id\" class=\"btn btn-primary btn-block\"><i class=\"icon-edit icon-white\"></i> Manage</a></td>
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
  
  </div>

 

    </div><!-- /container -->  
<?php require ('sections/footer.tpl.php'); ?>
