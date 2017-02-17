<?php
require 'boot.php';
$cmd = _post('oid');
$d = ORM::for_table('orders')->find_one($cmd);
$cid = $d['userid'];
$ordernum = $d['ordernum'];
$pname = $d['pname'];
//$notes = $d['notes'];
// v 2.3.0
$notes = $_POST['message'];
if ($notes == '' OR $notes == '<p><br></p>'){
    r2("order.php?_show=$cmd",'e','Activation message was empty. Please save activation email before sending to Client.');
}
// we will also save new activation message
$d->notes = $notes;
$d->save();

// end v 2.3.0
$d = ORM::for_table('accounts')->find_one($cid);
$email = $d['email'];
$name = $d['name'];
$sysEmail=lc('Email');
        $sysCompany=lc('CompanyName');
        $sysUrl= lc('sysUrl');
$d= ORM::for_table('email_templates')->where('tplname', 'Order:Activation Email')->find_one();
$template = $d['message'];
$subject = $d['subject'];
#bmsapp.com Version 1.1.9
$send = $d['send'];
#------------------------
 $data = array(
 
            'logo'=> '<div style="padding:5px">
<img style="border: none; zoom: 1; display: block; float: left; margin-bottom: 5px;" src="'.$sysUrl.'/assets/uploads/logo.png">
</div>

<div style="clear:both;"></div>',
            'business_name'=> $sysCompany,
             'activation_message'=> $notes
        );
        $message = _render($template,$data);
        $data = array(
            'business_name'=> $sysCompany
        );  
		$mail_subject = _render($subject,$data); 
     $mcom = lc('CompanyName');
	 
	  $body = $message;

	require ('../lib/pnp/email/class.phpmailer.php') ;
	$mail = new PHPMailer(); 
    $mail->SetFrom($sysEmail, $sysCompany);
    $mail->AddReplyTo($sysEmail, $sysCompany);
    $mail->AddAddress($email, $name);
    $mail->Subject    = $mail_subject;
    $mail->MsgHTML($body);
	$mail->Send();
	$eml = emailLog($cid,$email,$mail_subject,$body);
 
	r2("view-email.php?_xClick=$eml",'s','Email Sent Successfully');