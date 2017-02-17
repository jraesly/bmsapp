<?php
error_reporting(0);
require "../AppConfig.php";
try {
    $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
$appurl = $_POST['appurl'];
$stmt=$dbh->prepare("UPDATE appconfig SET value = '$appurl'  where setting= 'sysUrl'");
    $result= $stmt->execute();

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Business Management Application</title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <style type="text/css">
    
   .box                { width: 500px; height: 400px; padding: 10px; border: 1px solid black; float: left; margin: 0 20px 0 0; }
   .box-two            { overflow: auto; } 
    
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
	<link type='text/css' href='../cp/views/bmsapp/css/cstyle.css' rel='stylesheet' />
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="../assets/css/clientstyle.css" rel="stylesheet">
    
<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
        <script type="text/javascript" src="../cp/views/bmsapp/js/custom.js"></script>
        
        
</head>
<body style='background-color: #FBFBFB;'>
<div id='main-container'>
<div class='header'>
<div class="header-box wrapper">
<div class="hd-logo"><a href="#"><img src="../assets/uploads/logo.png" alt="Logo"/></a></div>
</div>

</div>
<!--  contents area start  -->
<div class="row-fluid">
<div class="span12">
<h4> BmsApp Installer </h4>

<p>
<strong>Congratulations!</strong><br>
You have just install BmsAPP!<br>
To Login Admin Portal:<br>
Use this link -
<?php
$cururl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$appurl = str_replace('/install/step5.php','',$cururl);
echo '<a href="'.$appurl.'/manage">'.$appurl.'/manage</a>';
?>
<br>
Username: admin<br>
Password: 123456<br>
After login, go to Setup -> System Settings to change other Configurations.
</p>

</div>
</div>
<!--  contents area end  -->
</div>
<div class="footer">Copyright &copy; 2016 All Rights Reserved<br />
<br />
</div>
    <script src="../assets/js/bootstrap.min.js"></script>
            </body>
</html>