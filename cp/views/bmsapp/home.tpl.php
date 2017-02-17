<?php
 include ('sections/header.tpl.php'); 
 ?>
    <div class="span4">
      <!--Sidebar content-->
    <address>
  <strong><?php  echo $cl['name']; ?></strong><br>
  <?php  echo $cl['company']; ?><br>
  <?php  echo $cl['address1'] .' '. $cl['address2']; ?><br>
   <?php  echo $cl['city'] .', '.$cl['state'].'-'.$cl['postcode']; ?><br>
  <abbr title="Phone">P:</abbr> <?php echo $cl['phone']; ?>
</address>
 
<address>
  <strong><?php echo $_L['registered_email_address'] ?></strong><br>
  <a href="<?php echo 'my-emails'.EXT; ?>"><?php  echo $cl['email']; ?></a>
</address>
<address>
  <strong><?php echo $_L['account_credit']; ?> : <?php echo $cl['balance'] ; ?> </strong><br>
 <a class="btn btn-primary" href="add-fund.php"><?php echo $_L['add_fund'] ?></a>
  <a class="btn" href="my-transactions.php"><?php echo $_L['view_statement'] ?></a>
</address>
    </div>
    <div class="span8">
      <!--Body content-->
      <h6><?php echo $_L['last5invoice']; ?></h6>
      <?php
$fquery="select *from invoices where userid='$cid' ORDER BY id DESC LIMIT 0, 5";
$stmt = $dbh->prepare("$fquery");
$stmt->execute();
$result = $stmt->fetchAll();
$i=0;
$totalReq=$stmt->rowCount();

?>
      <table class="table table-striped table-hover">
  <tr>
    <th scope="col"><?php echo $_L['invoice'] ?></th>
    <th scope="col"><?php echo $_L['date'] ?></th>
    <th scope="col"><?php echo $_L['amount'] ?></th>
    <th scope="col"><?php echo $_L['status'] ?></th>
    <th scope="col">&nbsp;</th>
  </tr>
   <?php
if ($totalReq > 0) {
    foreach($result as $value) {
		$i++;
        $id = $value['id'];
		$created = $value['created'];

        $idate=strtotime($created);
        $created=date($sys_date,$idate);

		$status = $value['status'];

        if ($status == 'Paid'){

            $stxt = "<span class=\"label label-success\">".$_L['paid']."</span>";
        }
        elseif($status == 'Unpaid') {
            $stxt = "<span class=\"label label-important\"> ".$_L['unPaid']."</span>";
        }
        else {
            $stxt = "<span class=\"label label-warning\"> ".$_L['cancelled']."</span>";
        }

		if ($status=='Unpaid'){
			$st="<a class=\"btn btn-danger btn-small\" href=\"invoice.php?_cmd=$id\">Pay Now</a>";
		}
		else {
		$st="<a class=\"btn btn-primary btn-small\" href=\"invoice.php?_cmd=$id\">View</a>";
		}
$total = $value['total'];
        echo "<tr>
    <td><a href=\"invoice.php?_cmd=$id\">$id</a></td>
    <td>$created</td>
    <td>$total</td>
    <td>$stxt</td>
    <td>$st</td>
  </tr>";
    }
}
?>

  <tr>
    <td colspan="5"><a class="btn btn-inverse" href="my-invoices.php"><?php echo $_L['view_all_invoices']; ?></a></td>
  </tr>
</table>
    </div>
    <div class="span12">      <h6><?php echo $_L['open_support_tickets'] ?></h6>
     <?php
$fquery="select id, tid, subject, replyby from tickets where userid='$cid' ORDER BY id DESC LIMIT 0, 5";
$stmt = $dbh->prepare("$fquery");
$stmt->execute();
$result = $stmt->fetchAll();
$i=0;
$totalReq=$stmt->rowCount();

?>
      <table class="table table-bordered table-striped table-hover">
  <tr>
    <th scope="col"><?php echo $_L['ticket'] ?>#</th>
    <th scope="col"><?php echo $_L['subject'] ?></th>
    <th scope="col"><?php echo $_L['last_responder'] ?></th>
  </tr>
  
  <?php
  $ext = EXT;
if ($totalReq > 0) {
    foreach($result as $value) {
		$i++;
        $id = $value['id'];
		$tid = $value['tid'];
		$subject = $value['subject'];
		$replyby = $value['replyby'];
        echo "<tr>
    <td>$tid</td>
    <td><a href=\"view-ticket$ext?_xClick=$id\">$subject</a></td>
    <td>$replyby</td>
  </tr>";
    }
}
else {
	echo '<tr>
    <td colspan="3">'.$_L['no_tickets'].'</td>
    </tr>';
}
?>
  <tr>
    <td colspan="3"><a class="btn btn-inverse" href="my-tickets.php"><?php echo $_L['view'] ?> <?php echo $_L['all_support_tickets'] ?></a> <a class="btn btn-primary" href="create-ticket.php"><?php echo $_L['new_ticket'] ?></a></td>
  </tr>
</table></div>

<?php include ('sections/footer.tpl.php'); ?>


