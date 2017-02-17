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
     <h2><?php echo $_L['accounts']; ?></h2>
     <a href="views/bmsapp/ajax/add-account.php" data-toggle="modal"  class="btn btn-primary btn-block"><i class="icon-plus icon-white"></i><?php echo $_L['addAccount']; ?></a>
 <hr>
   <h5>Total <?php echo $paginate['found']; ?> accounts Found. Showing Page <?php echo $fpage;?> of <?php echo $lpage; ?></h5>  
   <hr>
    <a href="make<?php echo EXT; ?>?_what=csv&amp;__use__=<?php _encode($query); ?>" class="btn btn-primary btn-block"><i class="icon-list icon-white"></i> <?php echo $_L['exportCSV']; ?></a>
     <a href="make<?php echo EXT; ?>?_what=pdf&amp;__use__=<?php _encode($query); ?>&amp;_title=All-Accounts&amp;_type=accounts" class="btn btn-primary btn-block"><i class="icon-list icon-white"></i> <?php echo $_L['exportPDF']; ?></a>
    </div>
    <div class="span10">
      <div  id="accounts-data">
<table class="footable" id="data">
      <thead>
        <tr>
          <th colspan="7" align="left"><select name="accounts" id="cfilter"  data-placeholder="Choose a Country..." class="chzn-select" tabindex="2">
          <option value="?_filter=_blank" <?php if ($filter=='All') echo 'selected="selected"';  ?>><?php echo $_L['allAccount']; ?></option>
  <option value="?_filter=Customer" <?php if ($filter=='Customer') echo 'selected="selected"';  ?>><?php echo $_L['customer']; ?></option>
  <option value="?_filter=Vendor" <?php if ($filter=='Vendor') echo 'selected="selected"';  ?>><?php echo $_L['vendor']; ?></option>
  <option value="?_filter=Cash" <?php if ($filter=='Cash') echo 'selected="selected"';  ?>><?php echo $_L['cash']; ?></option>
  <option value="?_filter=Bank" <?php if ($filter=='Bank') echo 'selected="selected"';  ?>><?php echo $_L['bank']; ?></option>
  <option value="?_filter=Investor" <?php if ($filter=='Investor') echo 'selected="selected"';  ?>><?php echo $_L['investor']; ?></option>
  <option value="?_filter=Partner" <?php if ($filter=='Partner') echo 'selected="selected"';  ?>><?php echo $_L['partner']; ?></option>
  <option value="?_filter=Employee" <?php if ($filter=='Employee') echo 'selected="selected"';  ?>><?php echo $_L['employee']; ?></option>
  <option value="?_filter=Consultant" <?php if ($filter=='Consultant') echo 'selected="selected"';  ?>><?php echo $_L['consultant']; ?></option>
  <option value="?_filter=Income" <?php if ($filter=='Income') echo 'selected="selected"';  ?>><?php echo $_L['income']; ?></option>
  <option value="?_filter=Expense" <?php if ($filter=='Expense') echo 'selected="selected"';  ?>><?php echo $_L['expense']; ?></option>
  <option value="?_filter=TAX" <?php if ($filter=='TAX') echo 'selected="selected"';  ?>><?php echo $_L['tax']; ?></option>
  <option value="?_filter=Credit-Card" <?php if ($filter=='Credit-Card') echo 'selected="selected"';  ?>><?php echo $_L['creditCard']; ?></option>
  <option value="?_filter=Inventory" <?php if ($filter=='Inventory') echo 'selected="selected"';  ?>><?php echo $_L['inventory']; ?></option>
  <option value="?_filter=Long-Term-Liability" <?php if ($filter=='Long-Term-Liability') echo 'selected="selected"';  ?>><?php echo $_L['longTermLiability']; ?></option>
  <option value="?_filter=Accounts-Payable" <?php if ($filter=='Accounts-Payable') echo 'selected="selected"';  ?>><?php echo $_L['accountPayable']; ?></option>
  <option value="?_filter=Accounts-Receivable" <?php if ($filter=='Accounts-Receivable') echo 'selected="selected"';  ?>><?php echo $_L['accountReceivable']; ?></option>
  <option value="?_filter=Equity" <?php if ($filter=='Equity') echo 'selected="selected"';  ?>><?php echo $_L['equity']; ?></option>
  <option value="?_filter=Account-Credit" <?php if ($filter=='Account-Credit') echo 'selected="selected"';  ?>><?php echo $_L['accountCredit']; ?></option>
  <option value="?_filter=Cost-of-Goods-Sold" <?php if ($filter=='Cost-of-Goods-Sold') echo 'selected="selected"';  ?>><?php echo $_L['costGoodsSold']; ?></option>
  <option value="?_filter=Other" <?php if ($filter=='Other') echo 'selected="selected"';  ?>><?php echo $_L['other']; ?></option>
</select>


</th>
          </tr>
        <tr>
        
          <th>
<?php echo $_L['sl']; ?>          </th>
           <th>
<?php echo $_L['id']; ?>          </th>
          <th>
<?php echo $_L['accountName']; ?>          </th>
         
           <th data-hide="phone,tablet"><?php echo $_L['createdDate']; ?></th>
          
          <th data-hide="phone,tablet" data-type="numeric">
<?php echo $_L['balance']; ?>          </th>
          <th data-hide="phone">
<?php echo $_L['type']; ?>          </th>
          <th>
<?php echo $_L['manage']; ?>          </th>
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
		$name = $value['name'];
		
		$datecreated = $value['datecreated'];

        $idate=strtotime($date);
        $datecreated=date($sys_date,$idate);

		$balance = $value['balance'];
		$acctype=$value['acctype'];
		
		
		echo "<tr  class=\"gradeA\">
        
          <td>$i</td><td>$id
          </td><td>$name
          </td><td>$datecreated</td>
          <td>$dc $balance
          </td>
		  <td>$acctype</td>
		  <td><a href=\"account-profile$ext?__account=$id#account.profile/$id\" class=\"btn btn-primary btn-block\"><i class=\"icon-edit icon-white\"></i> Manage</a></td>
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
