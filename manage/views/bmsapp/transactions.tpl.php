<?php
$xheader='<link rel="stylesheet" type="text/css" href="../assets/lib/datatable/dt-bootstrap.css">
<link rel="stylesheet" href="../assets/lib/chosen/chosen.css" />
'
;
$xfooter='
<script src="../assets/lib/datepicker/public/javascript/zebra_datepicker.js"></script>
<script type="text/javascript" language="javascript" src="../assets/lib/datatable/jquery.dataTables.min.js"></script>
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
   
    <h4><?php echo $_L['transactions'];?></h4>
     <a href="income<?php echo EXT; ?>" class="btn btn-primary btn-block"><i class="icon-plus icon-white"></i><?php echo $_L['incomeEntry'];?></a>
     <a href="expense<?php echo EXT; ?>" class="btn btn-primary btn-block"><i class="icon-plus icon-white"></i><?php echo $_L['expenseEntry'];?></a>
     <a href="transfers<?php echo EXT; ?>" class="btn btn-primary btn-block"><i class="icon-plus icon-white"></i><?php echo $_L['transfer'];?></a>
 <hr>
   <h5>Total <?php echo $paginate['found']; ?> Transactions Found. Showing Page <?php echo $fpage;?> of <?php echo $lpage; ?></h5>  
   <hr>
    <a href="make<?php echo EXT; ?>?_what=csv&amp;__use__=<?php _encode($query); ?>" class="btn btn-primary btn-block"><i class="icon-list icon-white"></i><?php echo $_L['exportCSV'];?></a>
    </div>
    <div class="span10">
      <div  id="accounts-data">
<table class="footable" id="data">
      <thead>
        <tr>
          <th colspan="10" align="left"><select name="accounts" id="cfilter"  data-placeholder="Choose a Category..." class="chzn-select" tabindex="2">
          <option value="?_filter=_blank" <?php if ($filter=='_blank') echo 'selected="selected"';  ?>>All Transactions</option>
  <option value="?_filter=Income" <?php if ($filter=='Income') echo 'selected="selected"';  ?>><?php echo $_L['income'];?></option>
  <option value="?_filter=Expense" <?php if ($filter=='Expense') echo 'selected="selected"';  ?>><?php echo $_L['expense'];?></option>
  <option value="?_filter=Transfers" <?php if ($filter=='Transfers') echo 'selected="selected"';  ?>><?php echo $_L['transfer'];?></option>
  <option value="?_filter=Other" <?php if ($filter=='Other') echo 'selected="selected"';  ?>><?php echo $_L['other'];?></option>
</select>


</th>
          </tr>
        <tr>
        
          <th>
<?php echo $_L['sl'];?>          </th>
           <th>
<?php echo $_L['trId'];?>          </th>
          <th>
<?php echo $_L['dr'];?>  
          </th>
         
           <th><?php echo $_L['cr'];?>  </th>
          
          <th>
<?php echo $_L['amount'];?>            </th>
          <th>
<?php echo $_L['type'];?>            </th>

          <th>
            Date
          </th>
                    <th>
            Memo
          </th>                    
          <th>
            Status
          </th>
          <th>
            
          </th>
        </tr>
      </thead>
      <tbody>
          <?php
		  $ext = EXT;
		   if ($tfound>0){
		  $tr = ORM::for_table('transactions')->raw_query($query)->find_many();
		 
			$i= '0';
foreach ($tr as $trs) {
    $tto = $trs['ttoacc'];
    $facc = $trs['tfromacc'];
    $trid = $trs['id'];
    $date = $trs['date'];

    $idate=strtotime($date);
    $date=date($sys_date,$idate);

    $amount = $trs['amount'];
    $memo = $trs['memo'];
    $trantype = $trs['ttype'];
    $status = $trs['status'];
				$i++;
		echo "<tr>
        
          <td>$i</td>
          <td>$trid</td>
          <td>$facc</td>
          <td>$tto</td>
          <td>$amount</td>
     <td>$trantype</td>
	   <td>$date</td>
     <td>$memo</td>
	   <td>$status</td>
	   <td><a href=\"views/bmsapp/ajax/edit.transaction.php?_trid=$trid\" data-toggle=\"modal\"><i class=\"icon-pencil\"></i></a> 
    <a href=\"views/bmsapp/ajax/delete.transaction.php?_trid=$trid\" data-toggle=\"modal\"><i class=\"icon-remove\"></i></a></td>
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
