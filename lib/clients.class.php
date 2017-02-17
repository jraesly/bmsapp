<?php

Class Clients
{
    public static function login($username, $password)
    {
        global $dbh;
        $stmt = $dbh->prepare("SELECT id, email, password FROM accounts WHERE email = :user_id AND password = :password AND status='Active'");
        $stmt->bindParam(':user_id', $username, PDO::PARAM_STR, 12);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 30);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($stmt->rowCount() == "1") {
            foreach ($result as $value) {
                $_SESSION['cid'] = $value['id'];
                $lid = md5(uniqid(rand(), TRUE));
                $_SESSION['lid'] = $lid;
                setcookie("_lid", "$lid", time() + 86400);
                r2('cp/home' . EXT);

            }
        } else {
            r2('login' . EXT, 'e', 'Invalid Userid or Password');
        }

    }

    public static function Add($self, $name, $company = '', $address1, $address2, $city,
                               $state, $zip, $country, $phone, $email, $password,
                               $emailnotify = 'No', $acctype = 'Customer')
    {
        global $dbh;
        //check if already a same user with id
        if ($acctype == 'Customer' && $email == '') {
            r2($self, 'e', 'A Customer must have email address. Or Choose Different Account Type');
        }
        if ($acctype == 'Customer') {
            $stmt = $dbh->prepare("SELECT COUNT(id) from accounts WHERE email='$email'");
            $stmt->execute();
            $result = $stmt->fetch();
            $found = $result[0];
            if ($found >= 1) {
                r2($self, 'e', 'Error: A Contact with same email address already exisit');
            }
        }


        //
        $balance = '0.00';
        $datecreated = date('Y-m-d');
        $ip = $_SERVER['REMOTE_ADDR'];
        $host = '';
        $status = 'Active';
        $stmt = $dbh->prepare("INSERT INTO accounts (name,
company,
email,
address1,
address2,
city,
state,
postcode,
country,
phone,
password,
balance,
datecreated,
ip,
host,
status, emailnotify, acctype)
         VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute(array($name, $company, $email, $address1, $address2, $city, $state, $zip, $country, $phone, $password, $balance, $datecreated, $ip, $host, $status, $emailnotify, $acctype));
        $lastid = $dbh->lastInsertId();

        return $lastid;
    }

    public static function Update($name, $company, $email, $address1, $address2, $city, $state, $postcode, $country, $phone, $status, $password, $group = '0', $cid)
    {
        global $dbh;
        $stmt = $dbh->prepare("UPDATE accounts SET
         
         name= ?,
         company= ? ,
         email= ? ,
         address1= ?,
         address2= ? ,
         city= ? ,
         state= ?,
         postcode= ? ,
         country= ? ,
         phone= ?,
         status= ?,
         password= ? ,
          groupid= ?
          where
           id= ?"
        );
        if ($stmt->execute(array($name, $company, $email, $address1, $address2, $city, $state, $postcode, $country, $phone, $status, $password, $group, $cid)))

            return true;
        // exit ($stmt->queryString);
        return false;
    }

    public static function Delete($id)
    {
        global $dbh;


        $stmt = $dbh->prepare("DELETE From accounts Where id=?"
        );


        if ($stmt->execute(array($id))) return true;
        return false;
    }
}