<?php
Class Ticket {
    public static function Add($cid,$did,$email,$name,$subject,$msg,$file=''){
        global $dbh;
        $tid = substr(str_shuffle(str_repeat('0123456789',16)),0,16);
        $stmt = $dbh->prepare("INSERT INTO tickets (tid, did, userid, name, email, date, subject, message, attachment) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->execute(array($tid, $did, $cid, $name, $email, "now()", $subject, $msg, $file));
        $lastid=$dbh->lastInsertId();
return $lastid;
    }

}