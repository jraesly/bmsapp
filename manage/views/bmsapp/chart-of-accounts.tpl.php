<?php
$xfooter='<script src="../assets/js/sysfrm.js"></script>
            <script type="text/javascript">
    $(function() {
      $(\'table\').footable();
    });
  </script>';
$dc = lc('defaultcurrency');
require ('sections/header.tpl.php'); 
?>
    <div class="container">


<!-- Masthead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="row">
    <div class="span6">
      <h4><?php echo $_L['chatOfAccount'];?></h4>
    </div>
   
  </div>
  
</header>
<label><?php echo $_L['filterData'];?></label>
<div class="input-prepend">
      <span class="add-on"><i class="icon-search"></i></span>
      <input class="span2" id="filter" type="text">
    </div>
    
    
<form action="send-email" method="post">

<table data-filter="#filter" class="footable">
      <thead>
        <tr>
        
          <th data-class="expand" data-sort-initial="true">
<?php echo $_L['sl'];?>          </th>
           <th>
<?php echo $_L['id'];?>          </th>
          <th>
<?php echo $_L['accNumber'];?>          </th>
          <th><?php echo $_L['accountName'];?></th>
           <th data-hide="phone,tablet">Type</th>
          
          <th data-hide="phone,tablet">
<?php echo $_L['description'];?>          </th>
         
        </tr>
      </thead>
      <tbody>
          <?php
$query = "SELECT * from coa ORDER BY id ASC";
$stmt = $dbh->prepare("$query");
$stmt->execute();
$result = $stmt->fetchAll();
$i="0";
$ext = EXT;
if ($stmt->rowCount() > 0) {
    foreach($result as $value) {
				$i++;
				$i= str_pad($i,5,'0',STR_PAD_LEFT);
        $id = $value['id'];
		$accnumber = $value['accnumber'];
		$account = $value['account'];
		$type = $value['type'];
		$balance = $value['balance'];
		$description = $value['description'];
		
		
		echo "<tr>
        
          <td>$i</td><td>$id
          </td><td>$accnumber
          </td><td>$account
          </td><td>$type</td>
          <td>$description</td></tr>";
	}
}
?>
      </tbody>
    </table>
</form> 
<br>
 <hr>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>
