<?php
require 'boot.php';
$self='manage-accounts'.EXT;
$to = _get('_to');
$emto=findOne('accounts',$to);
$emailto = $emto['email'];
$emname = $emto['name'];
 $sysEmail=lc('Email');
        $sysCompany=lc('CompanyName');
        $sysUrl= lc('sysUrl');
$subject= _post('subject');
$message= _post('message');
$message = nl2br($message);
$email = _post('email');
if($subject=='') r2('account-profile'.EXT."?__account=$to#emails/$to",'e','Email was Not Sent, Subject was blank');

#v 2.2.0 Replace with phpMailer
require ('../lib/pnp/email/class.phpmailer.php') ;
$mail = new PHPMailer();
$mail->SMTPSecure = 'ssl';
$mail->SetFrom($sysEmail, $sysCompany);
$mail->AddReplyTo($sysEmail, $sysCompany);
$mail->AddAddress($emailto, $emname);
$mail->Subject    = $subject;
$mail->MsgHTML($message);
$mail->Send();
emailLog($to,$email,$subject,$message);
r2('account-profile.php?__account='.$to.'#account.profile/'.$to.'','s','Email sent Successfully');










