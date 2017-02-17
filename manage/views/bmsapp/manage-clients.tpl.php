<?php
$xfooter='<script src="../assets/js/sysfrm.js"></script>
            <script type="text/javascript">
    $(function() {
      $(\'table\').footable();
    });
  </script>';
$dc = lc('defaultcurrency');
require ('sections/header.tpl.php');
require ('../lib/paginator.sysfrm.php');
$paginate = _paginate('accounts',"WHERE (acctype='Customer')"); 
$startpoint= $paginate['startpoint'];
$limit= $paginate['limit'];
$fpage=$paginate['page'];
$lpage=$paginate['lastpage'];
?>
    <div class="container">


<!-- Masthead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="row">
    <div class="span12">
      <h4>Client Management. Total <?php echo $paginate['found']; ?> Clients Found. Showing Page <?php echo $fpage;?> of <?php echo $lpage; ?></h4>
    </div>
   
  </div>
  
</header>
<label><?php echo $_L['Filter_Client_Data'];?></label>
<div class="input-prepend">
      <span class="add-on"><i class="icon-search"></i></span>
      <input class="span2" id="filter" type="text">
    </div>
    
   
    
<form action="send-email" method="post">

<table data-filter="#filter" class="footable">
      <thead>
        <tr>
         
          <th data-class="expand" data-sort-initial="true">
            <?php echo $_L['sl'];?>
          </th>
           <th>
           <?php echo $_L['id'];?>
          </th>
          <th>
            <?php echo $_L['firstName'];?>
          </th>
          
           <th data-hide="phone,tablet"><?php echo $_L['Company'];?></th>
          <th data-hide="phone,tablet"><?php echo $_L['email_address'];?></th>
          <th data-hide="phone,tablet" data-type="numeric">
            <?php echo $_L['created'];?>
          </th>
          <th data-hide="phone">
            <?php echo $_L['status'];?>
          </th>
        </tr>
      </thead>
      <tbody>
          <?php
$query = "SELECT id, name, company, email, balance, status from accounts WHERE (acctype='Customer') ORDER BY id DESC LIMIT
{$startpoint} , {$limit}";
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
		$name = $value['name'];
		
		$company = $value['company'];
		$email = $value['email'];
		$balance = $value['balance'];
		$status=$value['status'];
		$stxt='<span class="label label-success">Active</span>';
		if($status=='Inactive'){
		$stxt='<span class="label">Inactive</span>';	
		}
		if($status=='Closed'){
		$stxt='<span class="label label-important">Closed</span>';	
		}
		
		echo "<tr>
        
          <td>$i</td><td><a href=\"account-profile$ext?__account=$id#account.profile/$id\">$id</a>
          </td><td><a href=\"account-profile$ext?__account=$id#account.profile/$id\">$name</a>
          </td><td>$company</td><td><a href=\"account.profile$ext?__account=$id#client.emails/$id/1\">$email</a></td>
          <td><a href=\"account-profile$ext?__account=$id#client.transactions/$id\">$dc $balance</a>
          </td><td data-value=\"suspended\">$stxt</td></tr>";
	}
}
?>
      </tbody>
    </table>
</form>
<?php  
 echo  $paginate['contents']; 
?>  
<br>
 <hr>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>
