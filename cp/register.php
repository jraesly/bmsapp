<?php
require 'boot.b4login.php';
$self = 'register.php';
if (isset($_POST['submit'])){
    require '../lib/validator.class.php';
    $name=_post('name');
    $company=_post('company');
    $address1=_post('address1');
    $address2=_post('address2');
    $city=_post('city');
    $state=_post('state');
    $zip=_post('zip');
    $country=_post('country');
    $phone=_post('phone');
    $email=_post('email');
    $password=_post('password');
    
    $confirmpassword=_post('confirmpassword');
    $iniPass = $password;
    $captcha=_post('captcha');
	$captcha = strtolower($captcha);
    $scaptcha= $_SESSION['captcha'];
    // validate
    if( $captcha !=$scaptcha  ) {
        r2($self,'e','Invalid Captcha Code. Please Try Again');
    }
   
    if ($name==''){
        r2($self,'e','Full Name is Required');
    }
    if ($address1==''){
        r2($self,'e','Address is Required');
    }
    if ($phone==''){
        r2($self,'e','Phone is Required');
    }
    if (!is_valid::Email($email)) {
        r2($self,'e','Please Enter a valid Email Address');
    }
    if ($password==''){
        r2($self,'e','Password is Required');

    }
    if ($password!=$confirmpassword){
        r2($self,'e','Password does not match');
    }
    if ($company==''){
        $company='n/a';
    }
    $password = md5($secret . $password);
    require ('../lib/clients.class.php');
    $client= new Clients;
    $clRegister=$client->Add('register'.EXT,$name,$company,$address1,$address2,$city,$state,$zip,$country,$phone,$email,$password);
  //  exit ($clRegister);
//send email
$sysEmail=lc('Email');
        $sysCompany=lc('CompanyName');
        $sysUrl= lc('sysUrl');
$d= ORM::for_table('email_templates')->where('tplname', 'Details:Signup')->find_one();
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
             'username'=> $email,
              'password'=> $iniPass,
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
	require ('../lib/pnp/email/class.phpmailer.php') ;
	$mail = new PHPMailer(); 
    $mail->SetFrom($sysEmail, $sysCompany);
    $mail->AddReplyTo($sysEmail, $sysCompany);
    $mail->AddAddress($email, $name);
    $mail->Subject    = $mail_subject;
    $mail->MsgHTML($body);
	$mail->Send();
	emailLog($clRegister,$email,$mail_subject,$body);
}
    r2('login.php','s','Thanks for signing up. Check your email for details. You can login here.');

//
}
require ("views/$gTheme/register.tpl.php");