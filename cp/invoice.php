<?php
if (isset($_GET['_token'])){
require 'boot.b4login.php';	
$token = _get('_token');
$iid = _get('_cmd');
$invoice = findOne('invoices',$iid);
if($invoice==''){
	r2('home.php','e','Invalid Invoice ID');
}
$vtoken = $invoice['vtoken'];
if ($token!=$vtoken){
    	r2('home.php','e','Invalid Invoice Token');
}
$cid=$invoice['userid'];
}
else {
require 'boot.php';
$iid = _get('_cmd');
$invoice = findOne('invoices',$iid);
if($invoice==''){
	r2('home'.EXT,'e','Invalid Invoice ID');
}
$icid=$invoice['userid'];
if ($icid!=$cid) {exit;}	
}

$created = $invoice['created'];
$duedate = $invoice['duedate'];
$datepaid= $invoice['datepaid'];
$paymentmethod= $invoice['paymentmethod'];
$note = $invoice['notes'];
$total = $invoice['total'];
$caddress =lc('caddress');
$status = $invoice['status'];
$stbtn = 'Mark Cancelled';
$stact = 'cancel';
if ($status=='Unpaid'){
    $cls = 'unpaid';
	
	
    
}
elseif ($status=='Paid'){
    $cls = 'paid';
}
elseif ($status=='Partially Paid'){
    $cls = 'partiallypaid';
}
elseif ($status=='Cancelled'){
    $cls = 'cancelled';
    $stbtn = 'Mark Unpaid';
    $stact = 'unpaid';
}
else {
    $cls = 'draft';
}


$cdate = strtotime($created);
$created = date($sys_date, $cdate);

$ddate = strtotime($duedate);
$duedate = date($sys_date, $ddate);

$pdate = strtotime($datepaid);
$datepaid = date($sys_date, $pdate);

$cl=findOne('accounts',$cid);
$defaultcurrencysymbol= lc('defaultcurrencysymbol');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo lc('WebsiteTitle'); ?></title>
     <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="../assets/css/adminstyle.css" rel="stylesheet">
    <link href="../assets/css/common.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../assets/lib/invoice/invoice.css" type="text/css" charset="utf-8" />
    <link rel="stylesheet" href="../assets/lib/buttons/style.css" type="text/css" charset="utf-8" />  </head>

  <body>


  <!-- Navbar
    ================================================== --><div class="container">
  <div id="page">
	
	<!--To change the status of the invoice, update class name. for example "status paid" or "status overdue". Possible options are: draft, sent, paid, overdue-->
	<div class="status <?php echo $cls; ?>">
		<p><?php echo $_L['Paid']; ?></p>
	</div>
		
	<p class="recipient-address">
    <strong><?php echo $_L['Invoiced_To']; ?>-</strong><br>
	 <strong><?php  echo $cl['name']; ?></strong><br>
  <?php  echo $cl['company']; ?><br>
  <?php  echo $cl['address1'] .' '. $cl['address2']; ?><br>
   <?php  echo $cl['city'] .', '.$cl['state'].'-'.$cl['postcode']; ?><br>
  <abbr title="Phone">Phone:</abbr> <?php echo $cl['phone']; ?></p>
	
	<h1><?php echo $_L['Invoice']; ?> <?php echo $iid; ?></h1>
	<p class="terms"><strong><?php echo $_L['Date_Created']; ?>: <?php echo $created; ?></strong><br/>
	<?php echo $_L['Payment_due_by']; ?> <?php echo $duedate; ?></p>
	
	<img src="../assets/uploads/logo.png" alt="Logo" class="company-logo" />
	<form action="pay.invoice.php" method="post">
    
    <p class="company-address">
    <?php
 if ($status=='Unpaid'){
	 ?>
     <select name="pmethod" id="pmethod" >
            				<?php
$query = "SELECT name, processor from paymentgateways where status='Active' ORDER BY sorder DESC";
$stmt = $dbh->prepare("$query");
$stmt->execute();
$result = $stmt->fetchAll();
if ($stmt->rowCount() > 0) {
    foreach($result as $value) {
				$i++;
				
        $processor = $value['processor'];
		$name = $value['name'];
		
		echo "<option value=\"$processor\">$name</option>";
	}
}
?>
			                
			
			               
                </select>
                <input name="iid" type="hidden" value="<?php echo $iid; ?>">
   <button type="submit" class="btn btn-primary"><?php echo $_L['pay_now']; ?></button>
<br>
<br>
    
    <?php
 }
 ?>
    
    <strong><?php echo $_L['Pay_To']; ?>-</strong><br>
		<?php echo $caddress; ?>
	</p>
    </form>
	
	<table  class="table table-striped"> 
	<thead> 
	<tr> 
	     <th width="30px"><?php echo $_L['s_l']; ?></th> 
	    <th><?php echo $_L['Description']; ?></th> 
	    <th width="100px"><?php echo $_L['amount']; ?></th> 
	    
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
                   
                    $description = $value['description'];
					$amount = $value['amount'];
					echo "
					<tr> 
	   <td>$i</td>
	    <td>$description</td> 
	    <td>$defaultcurrencysymbol $amount</td> 
	   
	</tr> 
					";
				}
			}
	
	?>
    <?php
	/*
	
	<tr> 
	   <td colspan="2"><span class="pull-right">Sub Total</span></td>
	    <td>$ 100.00</td> 
	   
	</tr> 
	<tr> 
	   <td colspan="2"><span class="pull-right">TAX</span></td>
	    <td>$ 100.00</td> 
	   
	</tr> 
    <tr> 
	   <td colspan="2"><span class="pull-right">Total</span></td>
	    <td>$ 100.00</td> 
	   
	</tr> 
	*/
	?>
	</tbody> 
	</table> 
	
	<div class="total-due">
		<div class="total-heading"><p><?php echo $_L['Amount_Due']; ?></p></div>
		<div class="total-amount"><p><?php echo $defaultcurrencysymbol. ' '.$total ; ?></p></div>
	</div>
	
	<hr />
   <p> <?php echo $note; ?></p>
	<div class="pay-buttons">
 <?php
 if ($status=='Unpaid'){
	 ?>
    <a href="use-credit.php?_for_invoice=<?php echo $iid; ?>" class="color green button"><?php echo $_L['Pay_With_Prepaid_Credit']; ?></a>
    <?php
 }
 ?>
		
		<a href="#"  id="sysfrm_print" class="color blue button"><?php echo $_L['Print']; ?></a>
        <a href="home.php" class="color green button"><?php echo $_L['Back_To_Client_Area']; ?></a>


	</div>
	
</div>
<div class="page-shadow"></div>
</div><!-- /container -->
   <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/common.js"></script>
 <script>
 $(document).ready(function() {
         $("#sysfrm_print").click(function() {
            window.print();
         });
        
     });

</script>
  </body>
</html>