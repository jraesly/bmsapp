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
   
    <h2><?php echo $_L['invoices'];?></h2>
     <a href="invoice-wizard<?php echo EXT; ?>" class="btn btn-primary btn-block"><i class="icon-plus icon-white"></i> <?php echo $_L['addInvoices'];?></a>
 <hr>
   <h5>Total <?php echo $paginate['found']; ?><?php echo $_L['Invoice_found'];?> <?php echo $fpage;?> of <?php echo $lpage; ?></h5>  
   <hr>
    <a href="make<?php echo EXT; ?>?_what=csv&amp;__use__=<?php _encode($query); ?>" class="btn btn-primary btn-block"><i class="icon-list icon-white"></i><?php echo $_L['exportCSV'];?></a>
    </div>
    <div class="span10">
      <div  id="accounts-data">
<table class="footable" id="data">
      <thead>
        <tr>
          <th colspan="7" align="left"><select name="accounts" id="cfilter"  data-placeholder="Choose a Category..." class="chzn-select" tabindex="2">
          <option value="?_filter=_blank" <?php if ($filter=='_blank') echo 'selected="selected"';  ?>><?php echo $_L['allInvoices'];?></option>
  <option value="?_filter=Paid" <?php if ($filter=='Paid') echo 'selected="selected"';  ?>><?php echo $_L['paid'];?></option>
  <option value="?_filter=Unpaid" <?php if ($filter=='Unpaid') echo 'selected="selected"';  ?>><?php echo $_L['unPaid'];?></option>
  <option value="?_filter=Overdue" <?php if ($filter=='Overdue') echo 'selected="selected"';  ?>><?php echo $_L['overDue'];?></option>
  <option value="?_filter=Cancelled" <?php if ($filter=='Cancelled') echo 'selected="selected"';  ?>><?php echo $_L['cancelled'];?></option>
  <option value="?_filter=Refunded" <?php if ($filter=='Refunded') echo 'selected="selected"';  ?>><?php echo $_L['refunded'];?></option>
</select>


</th>
          </tr>
        <tr>
        
          <th>
<?php echo $_L['sl'];?>          </th>
           <th>
<?php echo $_L['id'];?>          </th>
          <th>
<?php echo $_L['clientName'];?>    
          </th>
         
           <th><?php echo $_L['invoiceDate'];?>    </th>
          
          <th>
           <?php echo $_L['dueDate'];?>    
          </th>
          <th>
<?php echo $_L['status'];?>          </th>
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
		
		$created = $value['created'];
		
		$duedate = $value['duedate'];


        $cdate=strtotime($created);
        $created=date($sys_date,$cdate);

        $ddate=strtotime($duedate);
        $duedate=date($sys_date,$ddate);


        $total=$value['total'];
		$status = $value['status'];

        if ($status == 'Paid'){

$stxt = "<span class=\"label label-success\">".$_L['paid']."</span>";
        }
        elseif($status == 'Unpaid') {
            $stxt = "<span class=\"label label-important\"> ".$_L['unPaid']."</span>";
        }
		else {
            $stxt = "<span class=\"label label-warning\"> ".$_L['cancelled']."</span>";
        }

		echo "<tr  class=\"gradeA\">
        
          <td>$i</td><td>$id
          </td><td>$userid
          </td><td>$created</td>
          <td>$duedate
          </td>
		  <td>$stxt $dc $total</td>
		  <td><a href=\"invoice$ext?_show=$id\" class=\"btn btn-primary btn-block\"><i class=\"icon-edit icon-white\"></i> Manage</a></td>
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
