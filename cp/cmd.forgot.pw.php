<?php
require "boot.b4login.php";
require ('../lib/pnp/email/class.phpmailer.php') ;
if ($xstage=='Demo'){
r2('login.php','e','Password Reset Option is Disabled in The Demo Mode');
}
$self = 'forgot-pw.php';
if (isset($_POST['act'])&& $_POST['act']=='reset'){
	$username = _post('username');
	$found = ORM::for_table('accounts')->where('email', $username)->count();
	if ($found=='1'){
		$pwk = _raid('16');
	$pwke = time()+3600;	
    $d = ORM::for_table('accounts')->where('email', $username)->find_one();
	$name = $d['name'];
	$cid = $d['id'];
	$d->pwresetkey = $pwk;
	$d->pwresetexpiry = $pwke;
	
	$d->save();
	//send email
	$ip=$_SERVER['REMOTE_ADDR'];
	$sysEmail=lc('Email');
        $sysCompany=lc('CompanyName');
        $sysUrl= lc('sysUrl');
$d= ORM::for_table('email_templates')->where('tplname', 'Details:Forgot Password')->find_one();
$template = $d['message'];
$subject = $d['subject'];
#bmsapp.com Version 1.1.9
$send = $d['send'];
#------------------------
$forgotpw_link = "$sysUrl/cp/cmd.forgot.pw.php?_key=$pwk";
 $data = array('name' => $name,
 
            'logo'=> '<div style="padding:5px">
<img style="border: none; zoom: 1; display: block; float: left; margin-bottom: 5px;" src="'.$sysUrl.'/assets/uploads/logo.png">
</div>

<div style="clear:both;"></div>',
            'business_name'=> $sysCompany,
             'username'=> $username,
              'ip_address'=> $ip,
            'forgotpw_link' => $forgotpw_link
        );
        $message = _render($template,$data);
      
$data = array(
   
            'business_name'=> $sysCompany
        );  
		$mail_subject = _render($subject,$data); 
     $mcom = lc('CompanyName');
	 
	  $body = $message;
	  if ($send=='1'){
	$mail = new PHPMailer(); 
    $mail->SetFrom($sysEmail, $sysCompany);
    $mail->AddReplyTo($sysEmail, $sysCompany);
    $mail->AddAddress($username, $name);
    $mail->Subject    = $mail_subject;
    $mail->MsgHTML($body);
	$mail->Send();
	emailLog($cid,$username,$mail_subject,$body);
	  }
	//
	r2('login.php','s','Password Reset Email sent. Please Check your email.');

	
	}
	else {
		r2($self,'e','Sorry There is no registered user with this email address');
	}
	
}
elseif (isset($_GET['_key'])){
	
$rkey = _get('_key');	
$found = ORM::for_table('accounts')->where('pwresetkey', $rkey)->count();
	if ($found=='1'){
		// create new password
		$d = ORM::for_table('accounts')->where('pwresetkey', $rkey)->find_one();
		$cid = $d['id'];
		$name = $d['name'];
		$username = $d['email'];
		//generate password
		$rawpass = _raid(6);
		$password = md5($secret . $rawpass);

		$d = ORM::for_table('accounts')->find_one($cid);
		
		$d->password = $password;
		$d->pwresetkey = '';
		$d->save();
		//send email about new password
		$ip=$_SERVER['REMOTE_ADDR'];
	$sysEmail=lc('Email');
        $sysCompany=lc('CompanyName');
        $sysUrl= lc('sysUrl');
$d= ORM::for_table('email_templates')->where('tplname', 'Details:Password Reset')->find_one();
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
             'username'=> $username,
              'password'=> $rawpass,
            'sys_url' => $sysUrl
        );
        $message = _render($template,$data);
$data = array(
   
            'business_name'=> $sysCompany
        );  
		$mail_subject = _render($subject,$data); 
     $mcom = lc('CompanyName');
	 
	  $body = $message;
	  if ($send=='1'){
	$mail = new PHPMailer(); 
    $mail->SetFrom($sysEmail, $sysCompany);
    $mail->AddReplyTo($sysEmail, $sysCompany);
    $mail->AddAddress($username, $name);
    $mail->Subject    = $mail_subject;
    $mail->MsgHTML($body);
	$mail->Send();
	emailLog($cid,$username,$mail_subject,$body);	
	r2('login.php','s','A New Password Generated. Please Check your email.');
	  }
		//
	}
	else {
		r2($self,'e','Sorry Password reset Token expired or not exist, Please try again');
	}
	
}
else {
	
}