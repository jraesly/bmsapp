<?php
$xheader = '<link rel="stylesheet" href="../assets/lib/invoice/invoice.css" type="text/css" charset="utf-8" />
    <link rel="stylesheet" href="../assets/lib/buttons/style.css" type="text/css" charset="utf-8" />';
$xfooter = '<script>
 $(document).ready(function() {
         $("#sysfrm_print").click(function() {
            window.print();
         });
        
     });

</script>
';

 require ('sections/header.tpl.php');
  ?><div class="container">
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
	<strong><?php echo $_L['Payment_due_by'];?> <?php echo $duedate; ?></strong></p>
	
	<img src="../assets/uploads/logo.png" alt="Logo" class="company-logo" />
	<p class="company-address">
    <strong><?php echo $_L['Pay_To'];?>-</strong><br>
		<?php echo $caddress; ?>
	</p>
	
	<table  class="table table-striped"> 
	<thead> 
	<tr> 
	     <th width="30px"><?php echo $_L['sl'];?></th> 
	    <th><?php echo $_L['description'];?></th>
        <th><?php echo $_L['Qty']; ?></th>
        <th width="100px"><?php echo $_L['amount'];?></th>
	    
	</tr> 
	</thead> 
	<tbody> 
	<?php
	$query = "SELECT description,amount,qty from invoiceitems where invoiceid='$iid' ORDER BY id ASC";
            $stmt = $dbh->prepare("$query");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $i="0";
            $ext = EXT;
            if ($stmt->rowCount() > 0) {
                foreach($result as $value) {
                    $i++;
                   
                    $description = $value['description'];
                    $qty = $value['qty'];
					$amount = $value['amount'];
					echo "
					<tr> 
	   <td>$i</td>
	    <td>$description</td>
	    <td>$qty</td>
	    <td>$defaultcurrencysymbol $amount</td> 
	   
	</tr> 
					";
				}
			}
	
	?>
  <?php
  if ($tax!='0.00'){
  ?>

	<tr>
        <td></td>
        <td colspan="2"><span class="pull-right"><?php echo $_L['Sub_Total'];?></span></td>
	    <td><?php echo $defaultcurrencysymbol. ' '.$stotal ; ?></td> 

	</tr> 
	<tr>
        <td></td>
	   <td colspan="2"><span class="pull-right"><?php echo $taxname; ?></span></td>
	    <td><?php echo $defaultcurrencysymbol. ' '.$tax ; ?></td> 
	   
	</tr> 
    <tr>
        <td></td>
	   <td colspan="2"><span class="pull-right"><?php echo $_L['total'];?></span></td>
	    <td><?php echo $defaultcurrencysymbol. ' '.$total ; ?></td> 
	   
	</tr> 
	
<?php
  }
  ?>
	</tbody> 
	</table> 
	
	<div class="total-due">
		<div class="total-heading"><p><?php echo $_L['Amount_Due'];?></p></div>
		<div class="total-amount"><p><?php echo $defaultcurrencysymbol. ' '.$total ; ?></p></div>
	</div>
	
	<hr />
    <?php echo $note; ?>
	<div class="pay-buttons">
 
    <a href="cmd.invoice.php?_cmd=<?php echo $stact; ?>&amp;_xClick=<?php echo $iid; ?>" class="color red button"><?php echo $stbtn; ?></a>
     <a href="cmd.invoice.php?_cmd=<?php echo $stact2; ?>&amp;_xClick=<?php echo $iid; ?>" class="color green button"><?php echo $stbtn2; ?></a>
		<a href="make.invoice.email.php?_invoice=<?php echo $iid; ?>" class="color blue button"><?php echo $_L['sendEmail'];?></a>
		<a href="#"  id="sysfrm_print" class="color blue button"><?php echo $_L['Print'];?></a>
        <a href="make.invoice.pdf.php?_invoice=<?php echo $iid; ?>" class="color blue button"><?php echo $_L['PDF'];?></a>
        <a href="edit.invoice.php?_edit=<?php echo $iid; ?>" class="color red button"><?php echo $_L['Edit'];?></a>
        <a href="delete.invoice.php?_delete=<?php echo $iid; ?>" class="color red button"><?php echo $_L['Delete'];?></a>
	</div>
	
</div>
<div class="page-shadow"></div>
</div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>
