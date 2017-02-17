<?php
require 'boot.php';
$self='my-tickets'. EXT;


$act = _post('submit');
if ($act=='reply'){
$tuserid = $cid;
$rid = _post('rid');
$self = 'view-ticket'.EXT.'?_xClick='.$rid;
$message = $_POST['message'];
$cl = ORM::for_table('accounts')->find_one($cid);
$clname = $cl['name'];
$email = $cl['email'];
$d = ORM::for_table('ticketreplies')->create();
$d->tid = $rid;
$d->userid = $cid;
    $d->date = date('Y-m-d H:i:s');
$d->email = $email;
$d->message = $message;
$d->admin = '0';
$d->name = $clname;
$d->save();
$cmd = ORM::for_table('tickets')->find_one($rid);
    $cmd->replyby=$clname;
    $cmd->save();
//Send Client Notification for Ticket Reply
$d = ORM::for_table('accounts')->find_one($cid);
$client = $d['name'];
//find the department id
$d = ORM::for_table('tickets')->find_one($rid);
$did = $d['did'];
//
$sysEmail=lc('Email');
        $sysCompany=lc('CompanyName');
        $sysUrl= lc('sysUrl');
$d= ORM::for_table('email_templates')->where('tplname', 'Tickets:Update')->find_one();
$template = $d['message'];
$tplsubject = $d['subject'];
#bmsapp.com Version 1.1.9
$send = $d['send'];
#------------------------
 $data = array(
 
            'logo'=> '<div style="padding:5px">
<img style="border: none; zoom: 1; display: block; float: left; margin-bottom: 5px;" src="'.$sysUrl.'/assets/uploads/logo.png">
</div>

<div style="clear:both;"></div>',
            
            'ticket_contents' => $message
        );
        $body = _render($template,$data);

  $data = array(
            'ticket_number' => $rid
        );  
		$mail_subject = _render($tplsubject,$data);    
     $mcom = lc('CompanyName');
$d = ORM::for_table('ticketdepartments')->find_one($did);
$depemail = $d['email'];
$depname = $d['name'];
$subject = '[TID-'.$gtid.'] Ticket Update';
if ($send=='1'){
	require ('../lib/pnp/email/class.phpmailer.php') ;
	$mail = new PHPMailer(); 
    $mail->SetFrom($sysEmail, $sysCompany);
    $mail->AddReplyTo($sysEmail, $sysCompany);
    $mail->AddAddress($depemail, $depname);
    $mail->Subject    = $subject;
    $mail->MsgHTML($body);
	$mail->Send();
}
//
r2($self,'s','Ticket Replied Successfully');

}