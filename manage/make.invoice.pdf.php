<?php
require 'boot.php';
$iid = _get('_invoice');
$invoice = findOne('invoices',$iid);
if($invoice==''){
	r2('manage-accounts'.EXT,'e','Invalid Invoice ID');
}
$cid=$invoice['userid'];
$created = $invoice['created'];
$duedate = $invoice['duedate'];
$datepaid= $invoice['datepaid'];
$paymentmethod= $invoice['paymentmethod'];
$note = $invoice['notes'];
$total = $invoice['total'];
$stotal = $invoice['subtotal'];
$tax = $invoice['tax'];
$taxname = $invoice['taxname'];
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

$cl=findOne('accounts',$cid);
$defaultcurrencysymbol= lc('defaultcurrencysymbol');
//invoice items
$query = "SELECT description,amount,qty from invoiceitems where invoiceid='$iid' ORDER BY id ASC";
            $stmt = $dbh->prepare("$query");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $i="0";
            $ext = EXT;
			$litems = '';
            if ($stmt->rowCount() > 0) {
                foreach($result as $value) {
                    $i++;
                   
                    $description = $value['description'];
					$amount = $value['amount'];
                    $qty = $value['qty'];
					$litems .="<tr> 
	   <td align=\"left\">$i</td>
	    <td align=\"left\">$description</td>
	     <td align=\"left\">$qty</td>
	    <td align=\"right\">$defaultcurrencysymbol $amount</td> 
	   
	</tr>";
					
				}
			}
	
	
//
  require ('../lib/pnp/tcpdf/config/lang/eng.php');
    require ('../lib/pnp/tcpdf/tcpdf.php');
 $author = findOne('admins',$aid);
    $aadmin= $author['username'];
    $filename='invoice-'.$iid.'.pdf';
	$html = '<table> 
	<thead>
	<tr>
	  <td align="left">&nbsp;</td>
	   <td align="left">&nbsp;</td>
	  <td align="left">&nbsp;</td>
	  <td align="right"><img src="../assets/uploads/logo.png" alt=""/></td>
	  </tr>
	<tr>
	  <td align="left">&nbsp;</td>
	   <td align="left">&nbsp;</td>
	  <td align="left">&nbsp;</td>
	  <td align="right">&nbsp;</td>
	  </tr>
	<tr>
	  <td align="left">&nbsp;</td>
	   <td align="left">&nbsp;</td>
	  <td align="left">&nbsp;</td>
	  <td align="right"><strong>Invoice: '.$iid.'</strong></td>
	  </tr>
	<tr>
	  <td align="left">&nbsp;</td>
	   <td align="left">&nbsp;</td>
	  <td align="left">&nbsp;</td>
	  <td align="right">&nbsp;</td>
	  </tr>
	<tr>
	  <td colspan="3" align="left"><strong>Created:</strong> '.$created.'<br />
      <strong>Due Date:</strong> '.$duedate.'</td>
	  </tr>
	<tr>
	  <td align="left">&nbsp;</td>
	   <td align="left">&nbsp;</td>
	  <td align="left">&nbsp;</td>
	  <td align="right">&nbsp;</td>
	  </tr>
	<tr>
	<td align="left"><strong>Invoiced To</strong><br />
'.$cl['name'].'
<br />'.$cl['company'].'<br />'.$cl['company'].'<br />'.$cl['address1'].'<br />'.$cl['address2'].'<br />'.$cl['city'].', '.$cl['state'].'-'.$cl['postcode'].'<br />'.$cl['country'].'
</td>
	  <td align="left">&nbsp;</td>
	   <td align="left">&nbsp;</td>
	  <td align="right"><strong>Pay To</strong><br />
'.$caddress.'

</td>
	  </tr>
	<tr> 
	   <td align="left">&nbsp;</td>
	    <td align="left">&nbsp;</td>
	    <td align="left">&nbsp;</td>
	    <td align="right">&nbsp;</td> 
	   
	</tr>
	<tr bgcolor="#CCCCCC"> 
	     <th align="left"><strong>S/L</strong></th> 
	    <th align="left"><strong>Description</strong></th>
	    <th align="left"><strong>Qty</strong></th>
	    <th align="right"><strong>Amount</strong></th> 
	    
	</tr> 
	</thead> 
	<tbody> 
	
					'.$litems.'
					<tr>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
	  </tr>
	  <tr>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td align="right"><strong>Sub Total</strong></td>
					  <td align="right"><strong>'.$defaultcurrencysymbol.' '.$stotal.'</strong></td>
	  </tr>
	  <tr>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td align="right"><strong>'.$taxname.'</strong></td>
					  <td align="right"><strong>'.$defaultcurrencysymbol.' '.$tax.'</strong></td>
	  </tr>
					<tr>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td align="right"><strong>Total Amount</strong></td>
					  <td align="right"><strong>'.$defaultcurrencysymbol.' '.$total.'</strong></td>
	  </tr>
					<tr>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
	  </tr> 
						
	
	</tbody> 
	</table> 
            
';

// create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);





// ---------------------------------------------------------

// set font
$pdf->SetFont('freesans', '', 10);

// add a page
    $pdf->AddPage();
    $style = '<style>


</style>
';

///////////////////////////////////////////////////html

    $html = <<<EOF
$html
EOF;


    $pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
  

// ---------------------------------------------------------

//Close and output PDF document
    $pdf->Output($filename, 'D');
