<?php
$xheader = '
<link href="../assets/lib/charts/xcharts.min.css" rel="stylesheet">
<link href="../assets/lib/charts/assets/css/daterangepicker.css" rel="stylesheet">
<link href="../assets/lib/charts/assets/css/style.css" rel="stylesheet">

';
$xfooter = '

		<!-- xcharts includes -->
		<script src="../assets/lib/charts/d3.v2.js"></script>
		<script src="../assets/lib/charts/assets/js/xcharts.min.js"></script>

		<!-- The daterange picker bootstrap plugin -->
		<script src="../assets/lib/charts/assets/js/sugar.min.js"></script>
		<script src="../assets/lib/charts/assets/js/daterangepicker.js"></script>

		<!-- Our main script file -->
		<script src="../assets/lib/charts/assets/js/script.js"></script>
	
';

 require ('sections/header.tpl.php');
  ?>
  <?php
$btbal = ORM::for_table('accounts')->where('acctype', 'Bank')->sum('balance');
$btbal = number_format($btbal,2);
$ctbal = ORM::for_table('accounts')->where('acctype', 'Customer')->sum('balance');
$ctbal = number_format($ctbal,2);
$ltbal = ORM::for_table('accounts')->where('acctype', 'Long-Term-Liability')->sum('balance');
$ltbal = number_format($ltbal,2);
$abal = ORM::for_table('accounts')->sum('balance');
$abal = number_format($abal,2);
?>
<div class="container">
<div class="row-fluid">
<div class="span12">
<span class="pull-right"><h3><?php echo $_L['revenueGraph'];?></h3></span>
</div>
<div class="span12">

<form class="form-horizontal">
			  <fieldset>
		        <div class="input-prepend">
		          <span class="add-on"><i class="icon-calendar"></i></span><input type="text" name="range" id="range" />
		        </div>
			  </fieldset>
			</form>
			
			<div id="placeholder">
				<figure id="chart"></figure>
			</div>
</div>


</div>

<div class="row-fluid">

<div class="span6 well">
<h4><?php echo $_L['netWorth'];?>: <?php echo $abal; ?></h4>
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
    <td><strong><?php echo $_L['Bank_n_Cash'];?></strong></td>
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
            <td><span class="pull-right"><h5><?php echo $_L['totalInAllAccount'];?>s</h5></span></td>
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
</div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>
