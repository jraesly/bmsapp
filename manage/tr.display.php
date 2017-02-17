<?php
require 'boot.php';
$dc = lc('defaultcurrency');
require ('../lib/paginator.sysfrm.php');
$paginate = _paginate('transactions',"WHERE (ttype='Income')"); 
$startpoint= $paginate['startpoint'];
$limit= $paginate['limit'];
$fpage=$paginate['page'];
$lpage=$paginate['lastpage'];
?>
<table class="footable" id="data">
      <thead>
        <tr>
        <th>
           <img id="ajxspin" src='../assets/img/blue_spinner.gif'/>
          </th>
          <th>
            TrID
          </th>
           <th>
           Dr.
          </th>
          <th>
            Cr. 
          </th>
          
           <th data-hide="phone,tablet">Memo</th>
          
          <th data-hide="phone,tablet" data-type="numeric">
            Amount
          </th>
          <th data-hide="phone">
            Date
          </th>
        </tr>
      </thead>
      <tbody>
          <?php
$ext = EXT;

$tr = ORM::for_table('transactions')->limit($limit)->offset($startpoint)->order_by_desc('id')->find_many();


foreach ($tr as $trs) {
    $tto = $trs['ttoacc'];
    $facc = $trs['tfromacc'];
    $trid = $trs['id'];
    $date = $trs['date'];
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
<script>
$('#ajxspin').css('visibility','hidden');
				$('[data-toggle="modal"]').click(function(e) {
	e.preventDefault();
	$('#ajxspin').css('visibility','visible');
	var url = $(this).attr('href');
	if (url.indexOf('#') == 0) {
		$(url).modal('open');
	} else {
		$.get(url, function(data) {
			$('<div class="modal hide fade">' + data + '</div>').modal();
		}).success(function() {
			$('#ajxspin').css('visibility','hidden');
			 });
	}
});</script>