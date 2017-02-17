<?php
require 'boot.php';
$self='my-tickets'. EXT;
if (isset($_POST['submit'])){

	require '../lib/validator.class.php';
$department=_post('department');
     $subject=_post('subject');
    $message= $_POST['message'];
if (!is_valid::Number($department)) {
r2($self,'e','An Error Occured Please Try Again');
			}
    if ($subject==''){
        r2($self,'e','Please Add a Subject');
    }
    if ($message==''){
        r2($self,'e','Please Add a Message');
    }
    
    $userid = $cid;
//$subject = _post('subject');
$did = $department;
$cl = ORM::for_table('accounts')->find_one($userid);
$client = $cl['name'];
$email = $cl['email'];
$date = date('Y-m-d H:i:s');
$d = ORM::for_table('tickets')->create();
$d->userid = $userid;
$d->tid = _raid('6');
$d->did = $did;
$d->subject = $subject;
$d->message = $message;
$d->admin = '0';
$d->date = $date;
$d->name = $client;
$d->replyby = $client;
$d->email = $email;
$d->status = 'Open';
$d->save();
$gtid = $d->id();
//send email
//send email to client
$sysEmail=lc('Email');
        $sysCompany=lc('CompanyName');
        $sysUrl= lc('sysUrl');
$d= ORM::for_table('email_templates')->where('tplname', 'Tickets:New Ticket')->find_one();
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
            'ticket_subject' => $subject,
            'ticket_contents' => $message
        );
        $body = _render($template,$data);

  $data = array(
            'ticket_number' => $gtid
        );  
		$mail_subject = _render($tplsubject,$data);    
     $mcom = lc('CompanyName');
$d = ORM::for_table('ticketdepartments')->find_one($did);
$depemail = $d['email'];
$depname = $d['name'];
if ($send=='1'){
	require ('../lib/pnp/email/class.phpmailer.php') ;
	$mail = new PHPMailer(); 
    $mail->SetFrom($depemail, $depname);
    $mail->AddReplyTo($depemail, $depname);
    $mail->AddAddress($email, $client);
    $mail->Subject    = $mail_subject;
    $mail->MsgHTML($body);
	$mail->Send();
}
r2($self,'s','Tickets Created Successfully'); 


}
$cl=findOne('accounts',$cid);
require ("views/$gTheme/create-ticket.tpl.php");