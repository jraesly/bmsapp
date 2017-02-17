<?php
require 'boot.php';
$trid = _get('_cmd');
 $trd= ORM::for_table('products')->find_one($trid);
 $pmethod=_post('pmethod');
 
if (!$pmethod==''){
	$pmethod=str_replace(".", "", $pmethod);
	$amount = $trd['price'];
	$item = $trd['name'];
	$currency_code = lc('defaultcurrency');
	$d = ORM::for_table('invoices')->create();
	$d->userid = $cid;
	$d->created = date('Y-m-d');
	$d->duedate = date('Y-m-d');
	$d->subtotal = $amount;
	$d->total = $amount;
     $d->vtoken = _raid('10');
    $d->ptoken = _raid ('10');
	$d->status = 'Unpaid';
	$d->paymentmethod = $pmethod;
	$d->save();
	$invoiceid= $d->id();
    $ordernum = _raid('10');
	$d = ORM::for_table('invoiceitems')->create();
	$d->invoiceid = $invoiceid;
	$d->userid = $cid;
	$d->description = $item;
	$d->amount = $amount;
	$d->save();
	$ip=$_SERVER['REMOTE_ADDR'];
	$d = ORM::for_table('orders')->create();
	$d->ordernum = $ordernum ;
	$d->userid = $cid;
	$d->pid = $trid;
	$d->pname = $item;
	$d->date = date('Y-m-d H:i:s');
	$d->amount = $amount;
	$d->paymentmethod = $pmethod;
	$d->invoiceid = $invoiceid;
	$d->status = 'Pending';
	$d->ipaddress = $ip;
	$d->save();
	//
//////////////////////////////////////////////////////////////////////////
//send email to client
require ('../lib/pnp/email/class.phpmailer.php') ;
$odate = date('Y-m-d H:i:s');
 $d = ORM::for_table('accounts')->find_one($cid);
 $name = $d['name'];
 $email = $d['email'];
$sysEmail=lc('Email');
        $sysCompany=lc('CompanyName');
        $sysUrl= lc('sysUrl');
$d= ORM::for_table('email_templates')->where('tplname', 'Order:Order Confirmation')->find_one();
$template = $d['message'];
$subject = $d['subject'];
#bmsapp.com Version 1.1.9
$send = $d['send'];
#------------------------
$data = array('name' => $name,
'logo'=> '<div style="padding:5px">
<img style="border: none; zoom: 1; display: block; float: left; margin-bottom: 5px;" src="'.$sysUrl.'/assets/uploads/logo.png">
</div>

<div style="clear:both;"></div>',
            'business_name'=> $sysCompany,
             'order_date'=> $odate,
              'order_num'=> $ordernum,
              'order_item'=> $item,
              'invoice_id'=> $invoiceid,
            'order_ip' => $ip
        );
        $message = _render($template,$data);
   $data = array(
   'order_number'=> $ordernum,
            'business_name'=> $sysCompany
        );  
		$mail_subject = _render($subject,$data);        
     $mcom = lc('CompanyName');
	 
	  $body = $message;
	  if ($send=='1'){
	$mail = new PHPMailer(); 
    $mail->SetFrom($sysEmail, $sysCompany);
    $mail->AddReplyTo($sysEmail, $sysCompany);
    $mail->AddAddress($email, $name);
    $mail->Subject    = $mail_subject;
    $mail->MsgHTML($body);
	$mail->Send(); 
	emailLog($cid,$email,$mail_subject,$body);
	  }
 //
//	/////////////////////////////////////////////////////////////////////////////
// Send invoice information

$d= ORM::for_table('email_templates')->where('tplname', 'Invoice:Invoice Created')->find_one();
$template = $d['message'];
$subject = $d['subject'];
#bmsapp.com Version 1.1.9
$send = $d['send'];
#------------------------
$data = array('name' => $name,
'logo'=> '<div style="padding:5px">
<img style="border: none; zoom: 1; display: block; float: left; margin-bottom: 5px;" src="'.$sysUrl.'/assets/uploads/logo.png">
</div>

<div style="clear:both;"></div>',
            'business_name'=> $sysCompany,
             'invoice_id'=> $invoiceid,
              'invoice_amount'=> $amount,
            'sys_url' => $sysUrl
        );
        $message = _render($template,$data);
   $data = array(
            'business_name'=> $sysCompany
        );  
		$mail_subject = _render($subject,$data);        
     $mcom = lc('CompanyName');
	 if ($send=='1'){
	  $body = $message;
	$mail = new PHPMailer(); 
    $mail->SetFrom($sysEmail, $sysCompany);
    $mail->AddReplyTo($sysEmail, $sysCompany);
    $mail->AddAddress($email, $name);
    $mail->Subject    = $mail_subject;
    $mail->MsgHTML($body);
	$mail->Send(); 
	emailLog($cid,$email,$mail_subject,$body);
	 }
///
$processFile = "../lib/pnp/$pmethod/processor.php";

if (file_exists($processFile)) {
    require($processFile);
	return;
} else {
   r2('home.php','e','The Payment Processor Not Found');
}
	
}
require ("views/$gTheme/buy.tpl.php");