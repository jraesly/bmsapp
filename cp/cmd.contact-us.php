<?php
require 'boot.b4login.php';
$name = _post('name');
$email = _post('email');
$subject = _post('subject');
$message = _post('message');
$from_ip = $_SERVER['REMOTE_ADDR'];
$from_browser = $_SERVER['HTTP_USER_AGENT'];
$d = ORM::for_table('enquiries')->create();

$d->name = $name;
$d->date = date('Y-m-d H:i:s');
$d->email = $email;
$d->message = $message;
$d->subject = $subject;
$d->ip = $from_ip;
$d->save();


