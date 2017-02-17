<?php
require 'boot.php';
$self = 'bulk-email-wizard'.EXT;
if ($xstage=='Demo'){
r2($self,'e','Email will not be sent in the Demo Mode');
}
$subject = _post('subject');
$message = $_POST['message'];
    $clgroup = $_POST['clgroups'];
$query = 'select name, email from accounts';
$addC='';
foreach ($clgroup as $group){
    $addC .= 'groupid='.$group.' OR ';
}
$addC = substr($addC,0,-4);
//echo $addC;
if ($addC!=''){
    $query = $query.' WHERE ( '.$addC.' )';
   // echo $query;
}
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();
$email= '';

if ($stmt->rowCount() > 0) {
	$sysEmail=lc('Email');
    $sysCompany=lc('CompanyName');
 require ('../lib/pnp/email/class.phpmailer.php');  
 $mail = new PHPMailer(); 
  $mail->SetFrom($sysEmail, $sysCompany);
    $mail->AddReplyTo($sysEmail, $sysCompany);
	 foreach($result as $value) {


        $email = $value['email'];
		$name = $value['name'];
		$mail->AddAddress($email, $name);
        }
    $mail->Subject    = $subject;
    $mail->MsgHTML($message);
   $mail->Send();

}

//echo $email;
require ("views/$gat/bulk-email-send.tpl.php");