<?php
$xheader='
<link rel="stylesheet" type="text/css" href="../assets/lib/datepicker/public/css/zebra_datepicker.css">
<link rel="stylesheet" href="../assets/lib/chosen/chosen.css" />
';
$xfooter = '
<script src="../assets/lib/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="../assets/lib/datepicker/public/javascript/zebra_datepicker.js"></script>
  <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
	<script>
	$(document).ready(function() {
    $(\'#date\').Zebra_DatePicker();
});
	</script>
<script>
$(\'#ajxspin\').css(\'visibility\',\'hidden\');
				$(\'[data-toggle="modal"]\').click(function(e) {
	e.preventDefault();
	$(\'#ajxspin\').css(\'visibility\',\'visible\');
	var url = $(this).attr(\'href\');
	if (url.indexOf(\'#\') == 0) {
		$(url).modal(\'open\');
	} else {
		$.get(url, function(data) {
			$(\'<div class="modal hide fade">\' + data + \'</div>\').modal();
		}).success(function() {
			$(\'#ajxspin\').css(\'visibility\',\'hidden\');
			 });
	}
});</script>

	
';

?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
    <div class="row-fluid">
    <?php notify(); ?>
    </div>
<div class="row-fluid">
<div class="span12 well">
<form method="post" action="add.invoice.recurring.php">
  <fieldset>
    <legend><?php echo $_L['adrci'];?></legend>
    <label><?php echo $_L['chooseCustomer'];?></label>
    <select name="accounts" data-placeholder="Choose Customer Account" id="accounts" class="chzn-select" tabindex="2">
                    <option value="0"><?php echo $_L['chooseContact'];?></option>
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
                <span class="help-block">&nbsp;</span>
    <label><?php echo $_L['product/service'];?></label>

    <input name="item" type="text" class="input-xxlarge" id="item">
    <label><?php echo $_L['price'];?></label>
    <input name="amount" type="text" class="input-small" id="price">
    <label><?php echo $_L['firstInvoiceDate'];?></label>
    <input name="date" type="text"  value="<?php echo date('Y-m-d'); ?>" id="date">
 
    <label><?php echo $_L['frequency'];?></label>
    <select name="frequency" class="chzn-select" tabindex="2">
    <option value="30" selected="selected"><?php echo $_L['monthly'];?></option>
    <option value="365"><?php echo $_L['yearly'];?></option>
    <option value="7">Weekly</option>
    <option value="14">Every 2 Weeks</option>
    <option value="90">Every 3 Months</option>
    <option value="180">Every 6 Months</option>
    <option value="730">Biennially</option>
    </select>

    <label>How Many Times</label>
      <input name="schedule_time" type="text" placeholder="Ex: 4,3 or 8">

    <label><?php echo $_L['note'];?></label>
    <textarea name="notes" rows="4" class="input-xxlarge" id="notes"></textarea>
    <div class="form-actions">
  <button type="submit" name="submit" class="btn btn-primary"><?php echo $_L['submit'];?></button>
  <button type="reset" class="btn"><?php echo $_L['cancel'];?></button>
</div>
  </fieldset>
</form>
</div>
</div>
<div class="row-fluid">
<div class="span12">
<h4><?php echo $_L['listOfProductServices'];?></h4>
<table class="table table-striped">
<tr>
    <th><?php echo $_L['sl'];?></th>
    <th><?php echo $_L['invoiceId'];?></th>
    <th><?php echo $_L['clientId'];?></th>
    <th><?php echo $_L['date'];?></th>
    <th><?php echo $_L['nextDueDate'];?></th>
    <th><?php echo $_L['total'];?></th>
    <th><?php echo $_L['status'];?></th>
    <th><?php echo $_L['manage'];?> <img id="ajxspin" src='../assets/img/blue_spinner.gif'/></th>
  </tr>
<?php
$items = ORM::for_table('invoices')->select_many('id', 'userid', 'created', 'total', 'status', 'recurring')->where_gt('recurring', '0')->order_by_desc('id')->find_many();
$i='0';
$format = 'Y-m-d'; 
foreach ($items as $item) {
	$i++;
	$id = $item['id'];
    $userid = $item['userid'];
	$date = $item['created'];

	$recurring = $item['recurring'];
	$secdate= strtotime($date);
	
	$ndate = $secdate + ($recurring * 24 * 60 * 60);
	$ndate = date('Y-m-d',$ndate);


    $ndate = $secdate + ($recurring * 24 * 60 * 60);
    $ndate = date('Y-m-d',$ndate);



    $cdate=strtotime($date);
    $date=date($sys_date,$cdate);

    $pdate=strtotime($ndate);
    $ndate=date($sys_date,$pdate);



    $total = $item['total'];
	$status = $item['status'];
	echo "<tr>
    <td>$i</td>
    <td>$id</td>
    <td>$userid</td>
	<td>$date</td>
	<td>$ndate</td>
	<td>$total</td>
	<td>$status</td>
    <td><a class=\"btn btn-primary btn-small\" href=\"invoice$ext?_show=$id\">View Invoice</a>
     <a class=\"btn btn-warning btn-small\" href=\"cmd.invoice$ext?_xClick=$id&amp;_cmd=cancel-recurring\">Cancel Recurring</a></td>
  </tr>";
}
?>
</table>

</div>
</div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>