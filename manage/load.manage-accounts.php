<?php
require ('views/bmsapp/ajax/boot.ajax.php');
$dc = lc('defaultcurrency');
require ('../lib/paginator.sysfrm.php');
$paginate = _paginate('accounts',"WHERE (acctype='Customer')"); 
$startpoint= $paginate['startpoint'];
$limit= $paginate['limit'];
$fpage=$paginate['page'];
$lpage=$paginate['lastpage'];
//
$query = "SELECT id, name, company, email, balance, status from accounts WHERE (acctype='Customer') ORDER BY id DESC LIMIT
{$startpoint} , {$limit}";
$stmt = $dbh->prepare("$query");
$stmt->execute();
$result = $stmt->fetchAll();
$i="0";
$ext = EXT;
//
$data = '';
if ($stmt->rowCount() > 0) {
    foreach($result as $value) {
				$i++;
				$i= str_pad($i,5,'0',STR_PAD_LEFT);
        $id = $value['id'];
		$fname = $value['fname'];
		$lname = $value['lname'];
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
		$data .="[
      
      \"$i\",
	  \"<a href=\"account-profile$ext?__account=$id#account.profile/$id\">$id</a>\",
	  \"Mozilla 1.6\",
	  \"Mozilla 1.6\",
	  \"Mozilla 1.6\",
      \"Win 95+ / OSX.1+\",
      1.6,
      \"A\"
    ],";
	}
}
 header('Content-type: application/json; charset=utf-8');
 $data = rtrim($data,',');
 $data = '{
  "aaData": ['.$data.'  ]
}';
echo $data;
    
    exit;
