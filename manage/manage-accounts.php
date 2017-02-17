<?php
require 'boot.php';
$self = 'manage-accounts.php';
Acl::isAllowed($self);
$dc = lc('defaultcurrency');
require('../lib/paginator.sysfrm.php');
$filter = _get('_filter');
if ($filter == '' OR $filter == '_blank') {
    $adWhere = '';
} else {

    $adWhere = "WHERE (acctype='$filter')";
}
//Adding New Contact
if (isset($_POST['submit'])) {
    require '../lib/validator.class.php';
    $name = _post('name');
    $company = _post('company');
    $address1 = _post('address1');
    $address2 = _post('address2');
    $city = _post('city');
    $state = _post('state');
    $zip = _post('postcode');
    $country = _post('country');
    $phone = _post('phone');
    $email = _post('email');
    $emailnotify = _post('emailnotify');
    $acctype = _post('acctype');
    $groupid = _post('group');

    $iniPass = _raid('6');
    $password = md5($secret . $iniPass);
    if ($name == '') {
        r2($self, 'e', 'Name is Required');
    }

    if ($email == '') {
    } else {
        if (!is_valid::Email($email)) {
            r2($self, 'e', 'Please Enter a valid Email Address');
        }
    }
    if ($acctype == 'Customer' && $email == '') {
        r2($self, 'e', 'Please Enter a valid Email Address');
    }
//check if a client already exist with the same email id
    if ($email != '') {
        $cnt = ORM::for_table('accounts')->where('email', $email)->count('id');
        if ($cnt != '0') {
            r2($self, 'e', "An account with same Email id already exist");
        }
    }


    $datecreated = date('Y-m-d');
    $cmd = ORM::for_table('accounts')->create();
    $cmd->name = $name;
    $cmd->company = $company;
    $cmd->address1 = $address1;
    $cmd->address2 = $address2;
    $cmd->city = $city;
    $cmd->state = $state;
    $cmd->postcode = $zip;
    $cmd->country = $country;
    $cmd->phone = $phone;
    $cmd->datecreated = $datecreated;
    $cmd->email = $email;
    $cmd->password = $password;
    $cmd->emailnotify = $emailnotify;
    $cmd->acctype = $acctype;
    $cmd->groupid = $groupid;
    $cmd->save();
    $did = $cmd->id();
    //
    _log('admin', 'A New Account Added by Admin. Account ID- ' . $did . ' Admin ID- ' . $aid);
    //Send Email


    if ($emailnotify == 'Yes' && $email != '') {
        //send email
        $sysEmail = lc('Email');
        $sysCompany = lc('CompanyName');
        $sysUrl = lc('sysUrl');
        $d = ORM::for_table('email_templates')->where('tplname', 'Details:Signup')->find_one();
        $template = $d['message'];
        $subject = $d['subject'];
#bmsapp.com Version 1.1.9
        $send = $d['send'];
#------------------------
        $data = array('name' => $name,

            'logo' => '<div style="padding:5px">
<img style="border: none; zoom: 1; display: block; float: left; margin-bottom: 5px;" src="' . $sysUrl . '/assets/uploads/logo.png">
</div>

<div style="clear:both;"></div>',
            'business_name' => $sysCompany,
            'username' => $email,
            'password' => $iniPass,
            'sys_url' => $sysUrl
        );
        $message = _render($template, $data);
        $data = array(
            'business_name' => $sysCompany
        );
        $mail_subject = _render($subject, $data);
        $mcom = lc('CompanyName');

        $body = $message;
        if ($send == '1') {
            require('../lib/pnp/email/class.phpmailer.php');
            $mail = new PHPMailer();


            $e = ORM::for_table('emailconfig')->find_one('1');

            if ($e['method'] == 'smtp') {

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = $e['host'];  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = $e['username'];               // SMTP username
                $mail->Password = $e['password'];                        // SMTP password
                $mail->SMTPSecure = $e['secure'];                             // Enable TLS encryption, `ssl` also accepted
                $mail->Port = $e['port'];
            }

            $mail->SetFrom($sysEmail, $sysCompany);
            $mail->AddReplyTo($sysEmail, $sysCompany);
            $mail->AddAddress($email, $name);
            $mail->Subject = $mail_subject;
            $mail->MsgHTML($body);
            $mail->Send();
            emailLog($did, $email, $mail_subject, $body);
        }
    }
    // r2($self,'s','Account Added Successfully');
    # Modified V1.1.9 bmsapp.com
    r2('account-profile' . EXT . '?__account=' . $did . '#account.profile/' . $did, 's', 'Account Added Successfully');
}
//
$paginate = _paginate('accounts', $adWhere);
$startpoint = $paginate['startpoint'];
$limit = $paginate['limit'];
$fpage = $paginate['page'];
$lpage = $paginate['lastpage'];
$tfound = $paginate['found'];
$query = "SELECT id, name, datecreated, balance, acctype from accounts $adWhere ORDER BY id DESC LIMIT
{$startpoint} , {$limit}";

require("views/$gat/manage-accounts.tpl.php");