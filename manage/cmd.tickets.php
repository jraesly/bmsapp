<?php
require 'boot.php';
$self = 'tickets' . EXT;
$act = _post('submit');
if ($act == 'delete') {

    if ($xstage == 'Demo') {
        r2($self, 'e', 'Deleteing Tickets is disabled in the demo mode');
    }
    foreach ($tid as $tckt) {
        $cmd = ORM::for_table('tickets')->find_one($tckt);
        $cmd->delete();
    }

    r2($self, 's', 'Tickets Deleted Successfully');

} elseif ($act == 'markread') {

    $tid = $_POST['tid'];

    foreach ($tid as $tckt) {
        $cmd = ORM::for_table('tickets')->find_one($tckt);
        $cmd->aread = 'Yes';
        $cmd->save();

    }

    r2($self, 's', 'Ticket Status Updated Successfully');
} elseif ($act == 'markunread') {


    $tid = $_POST['tid'];

    foreach ($tid as $tckt) {
        $cmd = ORM::for_table('tickets')->find_one($tckt);
        $cmd->aread = 'No';
        $cmd->save();

    }

    r2($self, 's', 'Ticket Status Updated Successfully');
} elseif ($act == 'cdep') {


    $tid = $_POST['rid'];
    $did = _post('did');


    $cmd = ORM::for_table('tickets')->find_one($tid);

    $cmd->did = $did;
    $cmd->save();
    r2('view-ticket.php?_xClick=' . $tid, 's', 'Ticket Department Updated Successfully');
} elseif ($act == 'reply') {

    $tuserid = _post('userid');
    $rid = _post('rid');
    $self = 'view-ticket' . EXT . '?_xClick=' . $rid;
    $cid = _post('cid');
    $message = $_POST['message'];
# from v 2.3.0, validate message
    if ($message == '' OR $message == '<p><br></p>') {
        r2($self, 'e', 'Your replied message was empty');
    }

    $adm = ORM::for_table('admins')->find_one($aid);
    $admin = $adm['fname'] . ' ' . $adm['lname'];
    $d = ORM::for_table('ticketreplies')->create();
    $d->tid = $rid;
    $d->userid = $cid;
    $d->date = date('Y-m-d H:i:s');
    $d->message = $message;
    $d->admin = $admin;
    $d->name = $admin;
    $d->save();
    $cmd = ORM::for_table('tickets')->find_one($rid);
    $cmd->replyby = $admin;
    $cmd->save();
//
//Send Client Notification for Ticket Reply
    $d = ORM::for_table('accounts')->find_one($cid);
    $client = $d['name'];
    $email = $d['email'];
    $sysEmail = lc('Email');
    $sysCompany = lc('CompanyName');
    $sysUrl = lc('sysUrl');
    $d = ORM::for_table('email_templates')->where('tplname', 'Tickets:Update')->find_one();
    $template = $d['message'];
    $tplsubject = $d['subject'];
#bmsapp.com Version 1.1.9
    $send = $d['send'];
#------------------------
    $data = array(

        'logo' => '<div style="padding:5px">
<img style="border: none; zoom: 1; display: block; float: left; margin-bottom: 5px;" src="' . $sysUrl . '/assets/uploads/logo.png">
</div>

<div style="clear:both;"></div>',

        'ticket_contents' => $message
    );
    $body = _render($template, $data);

    $data = array(
        'ticket_number' => $rid
    );
    $mail_subject = _render($tplsubject, $data);
    $mcom = lc('CompanyName');
    $d = ORM::for_table('ticketdepartments')->find_one($did);
    $depemail = $d['email'];
    $depname = $d['name'];
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

        $mail->SetFrom($depemail, $depname);
        $mail->AddReplyTo($depemail, $depname);
        $mail->AddAddress($email, $client);
        $mail->Subject = $mail_subject;
        $mail->MsgHTML($body);
        $mail->Send();
    }
//
    r2($self, 's', 'Ticket Replied Successfully');

} elseif ($act == 'new') {
    $userid = _post('accounts');
    $subject = _post('subject');
    $did = _post('did');
    $message = $_POST['message'];
    if ($userid == '' OR $subject == '' OR $did == '' OR $message == '') {
        r2($self, 'e', 'All fields is required');
    }
    $adm = ORM::for_table('admins')->find_one($aid);
    $admin = $adm['fname'] . ' ' . $adm['lname'];
    $cl = ORM::for_table('accounts')->find_one($userid);
    $client = $cl['name'];
    $email = $cl['email'];
    $date = date('Y-m-d H:i:s');
    $d = ORM::for_table('tickets')->create();
    $d->userid = $userid;
    $d->did = $did;
    $d->tid = _raid('6');
    $d->subject = $subject;
    $d->message = $message;
    $d->admin = $admin;
    $d->date = $date;
    $d->name = $client;
    $d->email = $email;
    $d->replyby = $admin;
    $d->status = 'Open';
    $d->save();
    $gtid = $d->id();
//send email
//send email to client
    $sysEmail = lc('Email');
    $sysCompany = lc('CompanyName');
    $sysUrl = lc('sysUrl');
    $d = ORM::for_table('email_templates')->where('tplname', 'Tickets:New Ticket')->find_one();
    $template = $d['message'];
    $tplsubject = $d['subject'];
#bmsapp.com Version 1.1.9
    $send = $d['send'];
#------------------------
    $data = array(

        'logo' => '<div style="padding:5px">
<img style="border: none; zoom: 1; display: block; float: left; margin-bottom: 5px;" src="' . $sysUrl . '/assets/uploads/logo.png">
</div>

<div style="clear:both;"></div>',
        'ticket_subject' => $subject,
        'ticket_contents' => $message
    );
    $body = _render($template, $data);

    $data = array(
        'ticket_number' => $gtid
    );
    $mail_subject = _render($tplsubject, $data);
    $mcom = lc('CompanyName');

    $d = ORM::for_table('ticketdepartments')->find_one($did);
    $depemail = $d['email'];
    $depname = $d['name'];
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

        $mail->SetFrom($depemail, $depname);
        $mail->AddReplyTo($depemail, $depname);
        $mail->AddAddress($email, $client);
        $mail->Subject = $mail_subject;
        $mail->MsgHTML($body);
        $mail->Send();
    }

// send email to the department
    if ($send == '1') {
        $subject = '[TID-' . $gtid . ']A New Ticket has been Created for Client ID- ' . $userid;
        $mail->ClearReplyTos();
        $mail->ClearAllRecipients();


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
        $mail->AddAddress($depemail, $depname);
        $mail->Subject = $subject;
        $mail->MsgHTML($body);
        $mail->Send();
    }
//
//
    r2($self, 's', 'Tickets Created Successfully');

} else {
    // exit ("nothing");

}
$act = _get('act');
if ($act == 'delThis') {
    $self = 'tickets' . EXT;
    $rid = _get('_xClick');
    $cmd = ORM::for_table('tickets')->find_one($rid);
    $cmd->delete();
    $cmd = ORM::for_table('ticketreplies')
        ->where_equal('tid', $rid)
        ->delete_many();
    r2($self, 's', 'Ticket deleted Successfully');

} elseif ($act == 'closeThis') {
    $self = 'tickets' . EXT;
    $rid = _get('_xClick');
    $cmd = ORM::for_table('tickets')->find_one($rid);
    $cmd->status = 'Closed';
    $cmd->save();
    r2($self, 's', 'Ticket Marked as Closed');

} else {

}

