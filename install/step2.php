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
<div class="span12">
<h4> BmsApp Installer </h4>
<?php
$passed = '';
$ltext = '';
if (version_compare(PHP_VERSION, '5.2.0') >= 0) {
    $ltext .= 'To Run BmsAPP You need at least PHP version 5.2.0, Your PHP Version is: ' . PHP_VERSION . " Tested <strong>---PASSED---</strong><br/>";
    $passed .= '1';
    
}
else {
    $ltext .= 'To Run BmsAPP You need at least PHP version 5.2.0, Your PHP Version is: ' . PHP_VERSION . " Tested <strong>---FAILED---</strong><br/>";
    $passed .='0';
    
}

if (extension_loaded ('PDO' )){
    $ltext .= 'PDO is installed on your server: '."Tested <strong>---PASSED---</strong><br/>";
    $passed .= '1';
}
else {
    $ltext= 'PDO is installed on your server: '."Tested <strong>---FAILED---</strong><br/>";
    $passed .='0';
    
}

if (extension_loaded ('pdo_mysql' )){
    $ltext .= 'PDO MySQL driver is enabled on your server: '."Tested <strong>---PASSED---</strong><br/>";
    $passed .= '1';
}
else {
    $ltext .= 'PDO MySQL driver is not enabled on your server: '."Tested <strong>---FAILED---</strong><br/>";
    $passed .='0';
    
}
if ($passed=='111'){
 echo ("<br/> $ltext <br/> Great! System Test Completed. You can run BmsAPP on your server. Click Continue For Next Step.
 <br><br>
 <a href=\"step3.php\" class=\"btn btn-primary\">Continue</a> 
 ");   
}
else {
 echo ("<br/> $ltext <br/> Sorry. The requirements of BmsAPP is not available on your server. 
 Please contact with BmsAPP with this code- $passed Or contact with your server administrator
  <br><br>
 <a href=\"#\" class=\"btn btn-primary disabled\">Correct The Problem To Continue</a> 
 ");    
}


?>
</div>


<!--  contents area end  -->
</div>
<div class="footer">Copyright &copy; 2016 All Rights Reserved<br />
<br />
</div>
    <script src="../assets/js/bootstrap.min.js"></script>
            </body>
</html>

