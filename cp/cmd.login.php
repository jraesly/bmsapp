<?php
session_start();
define("_APP_RUN", true);
require "../AppINIT.php";

if (isset($_POST['login']))
{
	prf();
	$username=_post('username');
	$password=_post('password');
$after = $_POST['after'];
if ($after==''){
    $after = 'home.php';
    
}
    if($username==''){
        r2('login'.EXT,'e','Please Enter Your Username');
    }

    if($password==''){
        r2('login'.EXT,'e','Please Enter Your Password');
    }
	$password = md5($secret . $password);

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
                r2($after);

            }
        } else {
            r2('login'.EXT, 'e', 'Invalid Userid or Password');
        }
}