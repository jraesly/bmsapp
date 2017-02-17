<?php
$xheader = '<link rel="stylesheet" href="../assets/lib/invoice/invoice.css" type="text/css" charset="utf-8" />
    <link rel="stylesheet" href="../assets/lib/buttons/style.css" type="text/css" charset="utf-8" />';
$xfooter = '
<script type="text/javascript" src="../assets/js/invoice-edit.js"></script>
<script>
 $(document).ready(function() {
         $("#sysfrm_print").click(function() {
            window.print();
         });
        
     });

</script>
';

 require ('sections/header.tpl.php');
  ?>
 <form action="edit.invoice.php" method="post"> 
  <div class="container">
  <div class="alert alert-info">
              
            <strong><?php echo $_L['View_Invoice_Link'];?>: </strong> <a href="<?php echo lc('sysUrl').'/cp/invoice.php?_cmd='.$iid.'&amp;_token='.$vtoken; ?>" target="_blank"><?php echo lc('sysUrl').'/cp/invoice.php?_cmd='.$iid.'&amp;_token='.$vtoken; ?></a> </div>
  <?php notify(); ?>
  <div id="page">
	
	<!--To change the status of the invoice, update class name. for example "status paid" or "status overdue". Possible options are: draft, sent, paid, overdue-->
	<div class="status <?php echo $cls; ?>">
		<p><?php echo $_L['Paid'];?></p>
	</div>
		
	<p class="recipient-address">
    <strong><?php echo $_L['Invoiced_To'];?>-</strong><br>
	 <strong><?php  echo $cl['name']; ?></strong><br>
  <?php  echo $cl['company']; ?><br>
  <?php  echo $cl['address1'] .' '. $cl['address2']; ?><br>
   <?php  echo $cl['city'] .', '.$cl['state'].'-'.$cl['postcode']; ?><br>
  <abbr title="Phone"><?php echo $_L['phone'];?>:</abbr> <?php echo $cl['phone']; ?></p>
	
	<h1><?php echo $_L['invoice'];?> <?php echo $iid; ?></h1>
	<p class="terms"><strong><?php echo $_L['Date_Created'];?>: <?php echo $created; ?></strong><br/>
	<?php echo $_L['Payment_due_by'];?> <?php echo $duedate; ?></p>
	
	<img src="../assets/uploads/logo.png" alt="Logo" class="company-logo" />
	<p class="company-address">
    <strong><?php echo $_L['Pay_To'];?>-</strong><br>
		<?php echo $caddress; ?>
	</p>
	
	
	
    <table class="table table-striped inv_table">
<thead>
<tr>
	<th>&nbsp;
    
	</th>
	<th width="70%">
		<?php echo $_L['Item'];?>
	</th>
    
	<th>
		<?php echo $_L['amount'];?>
	</th>
</tr>
</thead>

<tbody>

<?php
	$query = "SELECT description,amount from invoiceitems where invoiceid='$iid' ORDER BY id ASC";
            $stmt = $dbh->prepare("$query");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $i="0";
            $ext = EXT;
            if ($stmt->rowCount() > 0) {
                foreach($result as $value) {
                    $i++;
                   $cls = '';
				   $inv_row= 'inv_row';
				   if ($i>1){
					$cls = '<a href="#" class="btn btn-danger inv_remove_btn"><i class="icon-minus icon-white"></i></a>';  
					$inv_row= ''; 
				   }
                    $description = $value['description'];
					$amount = $value['amount'];
					echo "
					<tr class=\"$inv_row\">
	   <td class=\"inv_clone_row\">$cls</td>
	    <td><input name=\"description[]\" type=\"text\" class=\"input-xxlarge\" value=\"$description\"></td> 
	    <td><input name=\"amount[]\" type=\"text\" class=\"input-small\" value=\"$amount\"></td> 
	   
	</tr> 
					";
				}
			}
	
	?>
<tr class="last_row">
	<td colspan="3">
    <a href="#" class="btn btn-primary inv_line_add"><i class="icon-plus icon-white"></i></a>
	  </td>
	</tr>
  
</tbody>
 
</table>

   
	
	
	<hr />
	
	 <p><?php echo $_L['Invoice_Note'];?>:<br />
 <input name="notes" type="text" style="width:860px" value="<?php echo $note; ?>"></p>
 <input name="act" type="hidden" value="edit">
<input name="cmd" type="hidden" value="<?php echo $iid; ?>">
 <button class="btn btn-primary" type="submit"><i class="icon-ok icon-white"></i> <?php echo $_L['save_changes'];?></button>  
 <a href="invoice.php?_show=<?php echo $iid; ?>" class="btn btn-primary"><i class="icon-arrow-left icon-white"></i> <?php echo $_L['cancel'];?></a>
</div>
<div class="page-shadow"></div>
</div>
</form>
<!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>
