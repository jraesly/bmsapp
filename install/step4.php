<?php
error_reporting (0);
$appurl = $_POST['appurl'];
$db_host = $_POST['dbhost'];
$db_user = $_POST['dbuser'];
$db_password = $_POST['dbpass'];
$db_name = $_POST['dbname'];
$cn = '1';

if ($cn == '1') {
    $input = "<?php
".'$db_host'." 		= \"$db_host\";
".'$db_port'." 		= \"\";
".'$db_user'." 		= \"$db_user\";
".'$db_password'." 	= \"$db_password\";
".'$db_name'." 		= \"$db_name\";
".'define("EXT", \'.php\')'.";
".'$secret'." = \"flmcs\";
?>
";
    $wConfig = "../AppConfig.php";
    $fh = fopen($wConfig, 'w') or die("can't create config file, your server does not support 'fopen' function,
 please create a file named - config.php with following contents- <br/>
 $input
 ");
    fwrite($fh, $input);
    fclose($fh);

    $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);

    $sql = file_get_contents('primary.sql');

    $qr = $dbh->exec($sql);

} else {
    header("location: step3.php?_error=1");
    exit;
}


?>
<!DOCTYPE html>
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
<?php
if ($cn=='1'){
$cururl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$appurl = str_replace('/install/step4.php','',$cururl);
?>
<p>
<strong>Config File Created and Database Imported.</strong><br>
</p>
<form action="step5.php" method="post">
  <fieldset>
    <legend>Configure your Application URL</legend>
    <label>URL</label>
    <input type='text' name="appurl" value="<?php echo $appurl; ?>">
    <span class='help-block'>Please do not edit above url if you are unsure. Just click continue.</span>
    
    
    <button type='submit' class='btn btn-primary'>Continue</button>
  </fieldset>
</form>
<?php
}
elseif ($cn=='2'){
?>
<p> MySQL Connection was successfull. An error occured while adding data on MySQL. Unsuccessfull Installation. </p>
<?php
}
else {
?>

<p> MySQL Connection Failed. </p>
<?php

}
?>
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

