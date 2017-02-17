<?php
$xheader='

';

$xfooter = '
<script>
 $(document).ready(function() {
         $("#sysfrm_print").click(function() {
			 //alert (\'hi\');
            window.print();
         });
        
     });

</script>
';
?>
<?php require ('sections/header.tpl.php'); ?>
    <div id="print_area" class="container">
<div class="row-fluid">
<div class="span12">
<table class="table table-striped">
        <thead>
          <tr>
            <th colspan="3"><span class="pull-right"><?php echo $_L['bankAndCashAccount'];?></span></th>
          </tr>
          <tr>
            <th><?php echo $_L['accId'];?></th>
            <th><?php echo $_L['accName'];?></th>
            <th><?php echo $_L['balance'];?></th>
          </tr>
        </thead>
        <tbody>
         
          <?php
		  $acc = ORM::for_table('accounts')
          ->where_raw('(`acctype` = ? OR `acctype` = ?)', array('Bank', 'Cash'))
          ->find_many();
foreach ($acc as $accounts) {
	$accid = $accounts['id'];
   $accname= $accounts['name'];
   $accbal = $accounts['balance'];
   
   echo " <tr>
            <td>$accid</td>
            <td>$accname</td>
            <td>$accbal</td>
          </tr>";
}
$btbal = ORM::for_table('accounts')
->where_raw('(`acctype` = ? OR `acctype` = ?)', array('Bank', 'Cash'))
->sum('balance');
$btbal = number_format ($btbal,2);
$abal = ORM::for_table('accounts')->sum('balance');
$abal = number_format($abal,2);
		  ?>
           <tr>
            <td colspan="2"><span class="pull-right"><strong><?php echo $_L['totalBankCash'];?></strong></span></td>
            <td><strong><?php echo $btbal; ?></strong></td>
          </tr>
        </tbody>
      </table>
</div>
</div>
<div class="row-fluid">
<div class="span12">
<table class="table table-striped">
        <thead>
          <tr>
            <th colspan="3"><span class="pull-right"><?php echo $_L['customerAccount'];?></span></th>
          </tr>
          <tr>
            <th><?php echo $_L['accId'];?></th>
            <th><?php echo $_L['accName'];?></th>
            <th><?php echo $_L['balance'];?></th>
          </tr>
        </thead>
        <tbody>
         
          <?php
		  $acc = ORM::for_table('accounts')->where('acctype', 'Customer')->where_not_like('balance', '0.00')->find_many();
foreach ($acc as $accounts) {
	$accid = $accounts['id'];
   $accname= $accounts['name'];
   $accbal = $accounts['balance'];
   
   echo " <tr>
            <td>$accid</td>
            <td>$accname</td>
            <td>$accbal</td>
          </tr>";
}
$ctbal = ORM::for_table('accounts')->where('acctype', 'Customer')->sum('balance');
$ctbal = number_format($ctbal,2);
		  ?>
           <tr>
            <td colspan="2"><span class="pull-right"><strong><?php echo $_L['totalCustomerAccount'];?></strong></span></td>
            <td><strong><?php echo $ctbal; ?></strong></td>
          </tr>
           <tr>
             <td colspan="3"><span class="pull-right"><?php echo $_L['accountDescription'];?></span></td>
           </tr>
        </tbody>
      </table>
</div>
</div>
<div class="row-fluid">
<div class="span12">
<table class="table table-striped">
        <thead>
          <tr>
            <th colspan="3"><span class="pull-right"><?php echo $_L['longTermLiability'];?></span></th>
          </tr>
          <tr>
            <th><?php echo $_L['accId'];?></th>
            <th><?php echo $_L['accName'];?></th>
            <th><?php echo $_L['balance'];?></th>
          </tr>
        </thead>
        <tbody>
         
          <?php
		  $acc = ORM::for_table('accounts')->where('acctype', 'Long-Term-Liability')->find_many();
foreach ($acc as $accounts) {
	$accid = $accounts['id'];
   $accname= $accounts['name'];
   $accbal = $accounts['balance'];
   
   echo " <tr>
            <td>$accid</td>
            <td>$accname</td>
            <td>$accbal</td>
          </tr>";
}
$ltbal = ORM::for_table('accounts')->where('acctype', 'Long-Term-Liability')->sum('balance');
$ltbal = number_format ($ltbal,2);
		  ?>
           <tr>
            <td colspan="2"><span class="pull-right"><strong><?php echo $_L['totalLiability'];?></strong></span></td>
            <td><strong><?php echo $ltbal; ?></strong></td>
          </tr>
        </tbody>
      </table>
</div>
</div>
<div class="row-fluid">
<div class="span6 well">
<h2>Net Worth: <?php echo $abal; ?></h2><br>
<button id="sysfrm_print" class="btn btn-warning"><?php echo $_L['print'];?></button>
</div>
<div class="span6">
<table class="table table-striped">
        <thead>
          <tr>
            <th colspan="2"><span class="pull-right"><h4><?php echo $_L['totalbalanceinallaccount'];?></h4></span></th>
          </tr>
          <tr>
            <th><h5><?php echo $_L['accountType'];?></h5></th>
            <th><h5><?php echo $_L['balance'];?></h5></th>
          </tr>
        </thead>
        <tbody>
         
  <tr>
    <td><strong><?php echo $_L['bankAndCash'];?></strong></td>
    <td><strong><?php echo $btbal; ?></strong></td>
  </tr>
  <tr>
    <td><strong><?php echo $_L['customerAccount'];?></strong></td>
    <td><strong><?php echo $ctbal; ?></strong></td>
  </tr>
  <tr>
    <td><strong><?php echo $_L['liabilities'];?></strong></td>
    <td><strong><?php echo $ltbal; ?></strong></td>
  </tr>
  
  

           <tr>
            <td><span class="pull-right"><h5><?php echo $_L['totalbalanceinallaccount'];?></h5></span></td>
            <td><h5><strong><?php
			      $bankbal= ORM::for_table('accounts')->where('acctype', 'Bank')->sum('balance');
                $ctbal = ORM::for_table('accounts')->where('acctype', 'Customer')->sum('balance');
                $ltbal = ORM::for_table('accounts')->where('acctype', 'Long-Term-Liability')->sum('balance');
                $tbalanace = $bankbal+$ctbal+$ltbal;
               $tbalanace=number_format($tbalanace,2);
               echo $tbalanace;
       
			 
			  ?></strong></h5></td>
          </tr>
        </tbody>
      </table>
</div>
</div>
</div>
    <!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>