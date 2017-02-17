<?php
Class Invoices
{
    public static function login($username, $password)
    {


    }

    public static function AddInvoice(
                               $userid,
                               $created = '',
                               $duedate,
                               $subtotal,
                               $total,
                               $status='Unpaid',
                               $paymentmethod='',
                               $notes=''
    )
    {

        global $dbh;
        $datepaid='0000-00-00 00:00:00';
        $stmt = $dbh->prepare("INSERT INTO invoices (userid,
created,
duedate,
datepaid,
subtotal,
total,
status,
paymentmethod,
notes)
         VALUES (?,?,?,?,?,?,?,?,?)");
       $result= $stmt->execute(array($userid, $created, $duedate, $datepaid, $subtotal, $total, $status, $paymentmethod, $notes));


        if ($result){
            $lastid = $dbh->lastInsertId();

            return $lastid;
        }
        return false;

    }

    public static function Update($fname, $lname, $company, $email, $address1, $address2, $city, $state, $postcode, $country, $phone, $password, $group = '0', $cid)
    {
        global $dbh;
        $stmt = $dbh->prepare("UPDATE accounts SET
         fname= ? ,
         lname= ?,
         company= ? ,
         email= ? ,
         address1= ?,
         address2= ? ,
         city= ? ,
         state= ?,
         postcode= ? ,
         country= ? ,
         phone= ?,
         password= ? ,
          groupid= ?
          where
           id= ?"
        );
        if ($stmt->execute(array($fname, $lname, $company, $email, $address1, $address2, $city, $state, $postcode, $country, $phone, $password, $group, $cid)))

            return true;
        // exit ($stmt->queryString);
        return false;
    }
    public static function Delete($id){
        global $dbh;


        $stmt = $dbh->prepare("DELETE From accounts Where id=?"
        );


        if ($stmt->execute(array($id)))  return true;
        return false;
    }
}