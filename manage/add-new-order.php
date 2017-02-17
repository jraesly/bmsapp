<?php
require 'boot.php';

Acl::isAllowed('add-new-order.php');

$self='add-new-order.php';
if (isset($_POST['act']) && ($_POST['act']=='add')){

    $cid = _post('cid');

    $qtys = $_POST['qty'];
    $qty[0] = '1';
    $i = '0';
    foreach ($qtys as $cqty){
        $qty[$i]= $cqty;

        $i++;
    }


    $prices= $_POST['uprice'];
    $i = '0';
    $total = '0.00';
    foreach ($prices as $cprice){

        $nq = $qty[$i];
        $xprice = ($nq*$cprice);
        $price[$i]= $xprice;
        $total += $xprice;
        $i++;
    }


    $iinv = 'Yes';
    if ($iinv = 'Yes'){

        $amount = $trd['price'];
        $item = 'Multiple';
        $currency_code = lc('defaultcurrency');
        $d = ORM::for_table('invoices')->create();
        $d->userid = $cid;
        $d->created = date('Y-m-d');
        $d->duedate = date('Y-m-d');
        $d->subtotal = $total;
        $d->total = $total;
        $d->vtoken = _raid('10');
        $d->ptoken = _raid ('10');
        $d->status = 'Unpaid';
        $d->save();
        $invoiceid= $d->id();
        $items = $_POST['item'];
        $i = '0';
        foreach ($items as $item){

            $d = ORM::for_table('invoiceitems')->create();
            $d->invoiceid = $invoiceid;
            $d->userid = $cid;
            $d->description = $item;
            $d->qty = $qty[$i];
            $d->amount = $price[$i];
            $d->save();
            $i++;
        }

    }
    else {
        $invoiceid = '';
    }
    $ordernum = _raid('10');
    $ip=$_SERVER['REMOTE_ADDR'];

    /*Add By Shamim (04-12-14)*/


    $d = ORM::for_table('orders')->create();
    $d->ordernum = $ordernum ;
    $d->userid = $cid;
    $d->pid = '0';
    $d->pname = 'Multiple Products for Invoice ID- <a href="invoice.php?_show='.$invoiceid.'">'.$invoiceid.'"</a>';
    $d->date = date('Y-m-d H:i:s');
    $d->amount = $total;
    $d->invoiceid = $invoiceid;
    $d->status = 'Pending';
    $d->ipaddress = $ip;
    $d->save();
    $oid = $d->id();
    ////////////////////////
    $d = ORM::for_table('accounts')->find_one($cid);
    $email = $d['email'];
    require ('../lib/pnp/email/class.phpmailer.php') ;
    $odate = date('Y-m-d H:i:s');
    $d = ORM::for_table('accounts')->find_one($cid);
    $name = $d['name'];
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
        'order_num'=> $oid,
        'order_item'=> 'Multiple Products for Invoice ID- '.$invoiceid.'',
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
        //log sent mail

        emailLog($cid,$email,$mail_subject,$body);
    }
    //////////////////////////
    r2('invoice.php?_show='.$invoiceid,'s','Order Added Successfully');
}

elseif (isset($_POST['act']) && ($_POST['act']=='step2')){

    $cid = _post('accounts');
    if ($cid=='' OR $cid=='0') {
        r2($self,'e','Please choose a Customer');
    }
    $pids = $_POST['product'];
    $i = 0;
    foreach($pids as $pid){

        $i++;
        if($pid == '0'){
            $i--;
        }
    }
    if ($i=='0') {
        r2($self,'e','You must choose at least one product');
    }

    require ("views/$gat/add-new-order-step2.tpl.php");

    exit;

}



require ("views/$gat/add-new-order.tpl.php");