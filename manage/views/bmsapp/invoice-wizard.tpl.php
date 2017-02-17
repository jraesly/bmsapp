<?php
$xheader='
<link rel="stylesheet" type="text/css" href="../assets/lib/datepicker/public/css/zebra_datepicker.css">
<link rel="stylesheet" href="../assets/lib/chosen/chosen.css" />
';
$xfooter='<script src="../assets/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
	
<script src="../assets/lib/datepicker/public/javascript/zebra_datepicker.js"></script>
<script src="../assets/lib/chosen/chosen.jquery.js" type="text/javascript"></script>

  <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
  <script src="../assets/js/invoice.sysfrm.js" type="text/javascript"></script>
<script src="../assets/lib/datatable/dt-bootstrap.js"></script>
		<script type="text/javascript" charset="utf-8">
			
			$(document).ready(function() {
    $(\'#rootwizard\').bootstrapWizard({
        tabClass: \'nav nav-tabs\',
       onTabShow: function(tab, navigation, index) {
			var $total = navigation.find(\'li\').length;
			var $current = index+1;
			var $percent = ($current/$total) * 100;
			$(\'#rootwizard\').find(\'.bar\').css({width:$percent+\'%\'});
		},
		onNext: function(tab, navigation, index) {
           // alert(\'next\');
        }
  });
$(\'#date\').Zebra_DatePicker();
$(\'.typeahead\').typeahead({
source: ['.$products.']
});
$("#Price").on("keyup", function () {
        var e = $(this).closest("tr");
        total_amount(e)
    });
});
		</script>	
		
		
		';
$dc = lc('defaultcurrency');
require ('sections/header.tpl.php');
?>
    <div class="container">
<?php notify(); ?>

  <div class="row-fluid">
    

<form action="cmd.invoice.php" method="post"><div class="span12">
			
			  
	            <h4><?php echo $_L['Create_Invoice'];?></h4>
	          
	
				<div id="rootwizard" class="tabbable tabs-left">
                <div id="bar" class="progress progress-striped active">
					  <div class="bar"></div>
	</div>
					<ul>
					  	<li><a href="#tab1" data-toggle="tab"><?php echo $_L['chooseCustomer'] ;?></a></li>
						<li><a href="#tab2" data-toggle="tab"><?php echo $_L['addItem'] ;?></a></li>
                        <li><a href="#tab3" data-toggle="tab"><?php echo $_L['taxVat'] ;?></a></li>
                        <li><a href="#tab4" data-toggle="tab"><?php echo $_L['addNote'] ;?></a></li>
						<li><a href="#tab5" data-toggle="tab"><?php echo $_L['genertaInvoice'] ;?></a></li>
						
						
					</ul>
                    
					<div class="tab-content">
					    <div class="tab-pane" id="tab1">
                        
					      <select name="accounts" data-placeholder="Choose Customer Account" id="accounts" class="chzn-select" tabindex="2">
                    <option value=""><?php echo $_L['Choose_Contact'];?></option>
                     <?php
$query = "SELECT id, name, company from accounts WHERE (acctype='Customer') ORDER BY id ASC";
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
		
		$company = $value['company'];
		if ($company!=''){
			$company = '( '.$company.' )';
		}
		
		echo "<option value=\"$id\">$name $company</option>";
	}
}
?>
                </select>
                <br><br><br><br><br>
                <p><?php echo $_L['Choose_Contact_from_above'];?></p>
	<br><br><br><br><br><br><br><br>
    <br><br>
				    </div>
                    <div class="tab-pane" id="tab2">
                        <div class="row-fluid">
           

                <table class="table table-striped" id="invoice-items">
                    <thead>
                    <tr>
                        <th></th>
                        
                        <th><?php echo $_L['Product_Service_Description'];?></th>
                       
                        
                        <th><?php echo $_L['amount'];?></th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="item-row">
                        <td></td>
                        
                        <td><input type="text" autocomplete="off" name="description[]" value="" class="input-xxlarge typeahead" id="description"/></td>
                       
                        
                        <td>
                            <input
                                    name="amount[]"
                                    class=" input-small"
                                    id="Price"
                                    type="text">
                        </td>
                       
                    </tr>
                    <tr>
                        <td colspan="2"><a href="#" id="item-add" class="btn btn-primary"><i class="icon-plus icon-white"></i> <?php echo $_L['addItem'];?></a>
                                   </td>
                        
                        <td><span id="total-amount"></span></td>
                       
                    </tr>
                    </tbody>
                </table>

        

            

            <hr class="">

      </div>
        
					    </div>
                        <div class="tab-pane" id="tab3">
                        
					      <select name="tax">
                          <option value="0" selected="selected">None</option>
 <?php
		  $accgroups = ORM::for_table('taxes')->find_many();

foreach ($accgroups as $accgroup) {
	$id = $accgroup['id'];
    $name = $accgroup['name'];
	
	echo "<option value=\"$id\" $xthis>$name</option>";
}
		  
		  ?>
</select>
                         <p><?php echo $_L['Tax_Exclusive_Inclusive'];?>  <a href="settings.php#tax-vat"><?php echo $_L['Configure_Taxes'];?></a><br />
                        <?php echo $_L['Tax_on_invoice'];?>
</p>
					    </div>
					    <div class="tab-pane" id="tab4">
                        
					     <textarea rows="5" id="compose" class="input-block-level"></textarea>
                         <p><?php echo $_L['adding_note_optional'];?></p>
					    </div>
						<div class="tab-pane" id="tab5">
							<button class="btn btn-large btn-primary input-block-level" name="act" value="add" type="submit"><?php echo $_L['genertaInvoice'];?></button>
					    </div>
						
						
						
						<ul class="pager wizard">
							<li class="previous first" style="display:none;"><a href="#">First</a></li>
							<li class="previous"><a href="#">&larr; Previous</a></li>
							<li class="next last" style="display:none;"><a href="#">Last</a></li>
						  	<li class="next"><a href="#">Next  &rarr;</a></li>
						</ul>
					</div>	
				</div>			
			
 		</div></form>
  </div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>
