<?php
$xheader='<link rel="stylesheet" type="text/css" href="../assets/lib/datatable/dt-bootstrap.css">
<link rel="stylesheet" type="text/css" href="../assets/lib/datepicker/public/css/zebra_datepicker.css">
<link rel="stylesheet" href="../assets/lib/chosen/chosen.css" />
';
$xfooter='<script type="text/javascript" language="javascript" src="../assets/lib/datatable/jquery.dataTables.min.js"></script>
<script src="../assets/lib/datepicker/public/javascript/zebra_datepicker.js"></script>
<script src="../assets/js/tr.component.sysfrm.js"></script>
<script src="../assets/lib/chosen/chosen.jquery.js" type="text/javascript"></script>
  <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
<script src="../assets/lib/datatable/dt-bootstrap.js"></script>
		<script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        
  
      } );
      $(\'#date\').Zebra_DatePicker({
        "show_icon": false
      });
      

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
    


    </script>';
$dc = lc('defaultcurrency');
require ('sections/header.tpl.php');
require ('../lib/paginator.sysfrm.php');
$paginate = _paginate('transactions',"WHERE (ttype='Transfers')"); 
$startpoint= $paginate['startpoint'];
$limit= $paginate['limit'];
$fpage=$paginate['page'];
$lpage=$paginate['lastpage'];
?>
    <div class="container">
   <div class="row">
    
    
   <?php notify(); ?>
  </div>  
<div class="row-fluid">

<div class="span4 well">
  	<legend><span id="stTxt">
<?php echo $_L['transfers']; ?>  

    </span></legend>
    <form accept-charset="UTF-8" action="" method="post" id="trForm">
    <div id="rmsg"></div>
		<div class="control-group">
            <label for="trdate" class="control-label"><?php echo $_L['date']; ?>  </label>
            <div class="controls">
                <input name="trdate" value="<?php echo date('Y-m-d'); ?>" id="date" type="text">
            </div>      
          </div>
        <div class="control-group">
            <label for="trfrom" class="control-label"><?php echo $_L['incomeForm']; ?>  </label>
            <div class="controls">
                <select name="trfrom"  data-placeholder="Choose an Account" id="trfrom" class="chzn-select" tabindex="2">
                    <option value=""><?php echo $_L['chooseAccount']; ?>  </option>
                     <?php
$query = "SELECT id, name, company from accounts ORDER BY id ASC";
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
            </div>      
          </div>
        <div class="control-group">
            <label for="select3" class="control-label"><?php echo $_L['targetAccount']; ?>  </label>
            <div class="controls">
              <select name="trto"  data-placeholder="Choose an Account" id="trto" class="chzn-select" tabindex="2">
                    <option value=""><?php echo $_L['chooseAccount']; ?>  </option>
                     <?php
$query = "SELECT id, name, company from accounts ORDER BY id ASC";
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
            </div>      
          </div>
          <div class="control-group">
    <label class="control-label" for="amount"><?php echo $_L['amount']; ?>  </label>
    <div class="controls">
      <input name="amount" class="input-small" type="text" id="amount">
    </div>
  </div>
          <div class="control-group">
    <label class="control-label" for="memo"><?php echo $_L['memo']; ?>  </label>
    <div class="controls">
      <input name="memo" class="input-xlarge" type="text" id="memo">
    </div>
  </div>
  <input name="trtype" id="trtype" type="hidden" value="Transfers" />
        <button class="btn btn-warning" id="tradd" type="button"><?php echo $_L['addEntry']; ?>  </button>
         
    </form>
</div>
<div  class="span8 well">
  	   <table class="footable" id="data">
      <thead>
        <tr>
        <th>
<!--            <img id="ajxspin" src='../assets/img/blue_spinner.gif'/>
           -->          </th>
          <th>
<?php echo $_L['trId']; ?>            </th>
           <th>
<?php echo $_L['dr']; ?>            </th>
          <th>
<?php echo $_L['cr']; ?>            </th>
          
           <th data-hide="phone,tablet"><?php echo $_L['memo']; ?>  </th>
          
          <th data-hide="phone,tablet" data-type="numeric">
<?php echo $_L['amount']; ?>            </th>
          <th data-hide="phone">
<?php echo $_L['date']; ?>            </th>
        </tr>
      </thead>
      <tbody>
          <?php
$ext = EXT;

$tr = ORM::for_table('transactions')->where('ttype','Transfers')->limit($limit)->offset($startpoint)->order_by_desc('id')->find_many();


foreach ($tr as $trs) {
    $tto = $trs['ttoacc'];
    $facc = $trs['tfromacc'];
    $trid = $trs['id'];
    $date = $trs['date'];

    $idate=strtotime($date);
    $date=date($sys_date,$idate);

    $amount = $trs['amount'];
    $memo = $trs['memo'];
    echo "<tr>
          <td><a href=\"views/bmsapp/ajax/edit.transaction.php?_trid=$trid\" data-toggle=\"modal\"><i class=\"icon-pencil\"></i></a> 
    <a href=\"views/bmsapp/ajax/delete.transaction.php?_trid=$trid\" data-toggle=\"modal\"><i class=\"icon-remove\"></i></a></td> <td> $trid</td><td>$facc
          </td><td>$tto
          </td><td>$memo</td>
          <td>$amount
          </td><td>$date</td></tr>";
}

?>
      </tbody>
    </table>
     <?php  
 echo  $paginate['contents']; 
?> 
    
  

    
  
</div>
</div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>
