<?php
require 'boot.php';
$self = 'invoices' . EXT;
$act = _post('act');
if ($act == '') {
    $act = _get('_cmd');
}
$rtxt = '';


switch ($act) {
    case 'add':

        $cid = _post('accounts');


        if ($cid == '') {
            r2($self, 'e', 'You did not select Customer, Please Try Again');
        }
        $notes = _post('notes');

        $amount = $_POST['amount'];

        $sTotal = '0';
        $i = '0';
        foreach ($amount as $samount) {
            $amount[$i] = $samount;
            $sTotal += $samount;
            $i++;
        }
        $tax = _post('tax');
        $taxval = '0.00';
        $taxname = '';
        $fTotal = $sTotal;
        if ($tax != '0') {
            $dt = ORM::for_table('taxes')->find_one($tax);
            $taxrate = $dt['rate'];
            $taxname = $dt['name'];
            $taxtype = $dt['type'];
            if ($taxtype == 'Excluded') {
                $taxval = ($sTotal * $taxrate) / 100;
                $fTotal = $fTotal + $taxval;

            } else {
                $taxval = ($sTotal * $taxrate) / 100;
                $sTotal = $fTotal - $taxval;
            }
//update the tax val in database
//$d = ORM::for_table('accounts')->find_one(101);
//$d->balance = $d['balance']+$taxval;
//$d->save();
        }
        $vtoken = _raid(10);
        $ptoken = _raid(10);
        $d = ORM::for_table('invoices')->create();
        $d->userid = $cid;
        $d->created = date('Y-m-d');
        $d->duedate = date('Y-m-d');
        $d->datepaid = date('Y-m-d');
        $d->subtotal = $sTotal;
        $d->total = $fTotal;
        $d->tax = $taxval;
        $d->taxname = $taxname;
        $d->vtoken = $vtoken;
        $d->ptoken = $ptoken;
        $d->status = 'Unpaid';
        $d->save();
        $invoiceid = $d->id();
        $description = $_POST['description'];
        $i = '0';
        foreach ($description as $item) {
            $d = ORM::for_table('invoiceitems')->create();
            $d->invoiceid = $invoiceid;
            $d->userid = $cid;
            $d->description = $item;
            $d->amount = $amount[$i];
            $d->save();
            $i++;
        }

        $rtxt = 'Invocie Saved Successfully';
        //send email to client
        $d = ORM::for_table('accounts')->find_one($cid);
        $name = $d['name'];
        $email = $d['email'];
        $sysEmail = lc('Email');
        $sysCompany = lc('CompanyName');
        $sysUrl = lc('sysUrl');
        $d = ORM::for_table('email_templates')->where('tplname', 'Invoice:Invoice Created')->find_one();
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
            'invoice_id' => $invoiceid,
            'invoice_amount' => $sTotal,
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

            $mail->SetFrom($sysEmail, $sysCompany);
            $mail->AddReplyTo($sysEmail, $sysCompany);
            $mail->AddAddress($email, $name);
            $mail->Subject = $mail_subject;
            $mail->MsgHTML($body);
            $mail->Send();
            emailLog($cid, $email, $mail_subject, $body);
        }

        //
        break;
    case 'cancel';
        $rid = _get('_xClick');
        $self = 'invoice' . EXT . '?_show=' . $rid;
        $cmd = ORM::for_table('invoices')->find_one($rid);
        $cmd->status = 'Cancelled';
        $cmd->save();
        $rtxt = 'Invoice Marked as Cancelled';
        break;


    case 'paid';
        $rid = _get('_xClick');
        $self = 'invoice.php?_show=' . $rid;
        $cmd = ORM::for_table('invoices')->find_one($rid);
        $cid = $cmd['userid'];

        $sTotal = $cmd['total'];

        $cmd->status = 'Paid';
        $cmd->save();
        // add income entry
        $tr = ORM::for_table('transactions')->create();
        $tr->ttype = 'Income';
        $tr->tfrom = $cid;
        $tr->tto = '102';
        $tr->amount = $sTotal;
        $tr->date = date('Y-m-d');
        $tr->memo = 'Invoice Payment';
        $tr->status = 'Completed';

        $acc = ORM::for_table('accounts')->find_one($cid);
        $cbal = $acc['balance'];
        $tfromacc = $acc['name'];
        $tr->tfromacc = $tfromacc;

        $rtxt = 'Invoice Marked as Paid';
        //send email to client
        $d = ORM::for_table('accounts')->find_one($cid);
        $name = $d['name'];
        $email = $d['email'];
        $sysEmail = lc('Email');
        $sysCompany = lc('CompanyName');
        $sysUrl = lc('sysUrl');
        $d = ORM::for_table('email_templates')->where('tplname', 'Invoice:Invoice Created')->find_one();
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
            'invoice_id' => $rid,
            'invoice_amount' => $sTotal,
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
            $mail->SetFrom($sysEmail, $sysCompany);
            $mail->AddReplyTo($sysEmail, $sysCompany);
            $mail->AddAddress($email, $name);
            $mail->Subject = $mail_subject;
            $mail->MsgHTML($body);
            $mail->Send();
            emailLog($cid, $email, $mail_subject, $body);
        }
        //
        break;
    case 'unpaid';
        $rid = _get('_xClick');
        $self = 'invoice' . EXT . '?_show=' . $rid;
        $cmd = ORM::for_table('invoices')->find_one($rid);
        $cmd->status = 'Unpaid';
        $cmd->save();
        $rtxt = 'Invoice Marked as Unpaid';
        break;
    case 'unpaid';
        $rid = _get('_xClick');
        $self = 'invoice' . EXT . '?_show=' . $rid;
        $cmd = ORM::for_table('invoices')->find_one($rid);
        $cmd->status = 'Unpaid';
        $cmd->save();
        $rtxt = 'Invoice Marked as Cancelled';

        break;

    case 'cancel-recurring';
        $rid = _get('_xClick');
        $self = 'invoice-recurring' . EXT;
        $cmd = ORM::for_table('invoices')->find_one($rid);
        $cmd->recurring = '0';
        $cmd->save();
        $rtxt = 'Invoice- ' . $rid . ' Recurring Status Cancelled.';


}
if ($rtxt == '') {
    r2($self, 'e', 'Action not defined');
}
r2($self, 's', $rtxt);