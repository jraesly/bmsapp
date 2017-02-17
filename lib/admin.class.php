<?php
Class Admins {
public static function login($username,$password){
global $dbh;
    $stmt = $dbh->prepare("SELECT id, username, password FROM admins WHERE username = :user_id AND password = :password AND status='Active'");
    $stmt->bindParam(':user_id', $username, PDO::PARAM_STR, 12);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR, 30);
    $stmt->execute();
    $result = $stmt->fetchAll();
	if ($stmt->rowCount()=="1") {
        foreach ($result as $value) {
            $_SESSION['aid']=$value['id'];
            $lid = md5(uniqid(rand(),TRUE));
            $_SESSION['lid'] = $lid;
            setcookie("_lid", "$lid", time()+86400);
            r2('home'.EXT);

        }
    }
    else {
        r2('login'.EXT,'e','Invalid Userid or Password');
    }

}
    public static function Add($fname,$lname,$company='',$address1,$address2,$city,$state,$zip,$country,$phone,$email,$password){
        global $dbh;
$balance='0.00';
        $ip=$_SERVER['REMOTE_ADDR'];
$host='';
        $status='Active';
        $stmt = $dbh->prepare("INSERT INTO accounts (fname,lname,company,email,address1,address2,city,state,postcode,country,phone,password,balance,datecreated,ip,host,status)
         VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute(array($fname, $lname, $company, $email, $address1, $address2, $city, $state, $zip,$country,$phone,$password,$balance, "now()", $ip, $host, $status));
        $lastid=$dbh->lastInsertId();
        return $lastid;
    }
}