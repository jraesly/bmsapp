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
if (isset($_GET['_error'])&&($_GET['_error'])=='1'){
    echo '<h4 style="color: red;"> Unable to Connect Database, Please make sure database info is correct and try again ! </h4>';
}
?>


<form action="step4.php" method="post">
  <fieldset>
    <legend>Database Connection</legend>
    <label>Database Host</label>
    <input type='text' name="dbhost">
    <span class='help-block'>e.g. localhost</span>
     <label>Database Username</label>
    <input type='text' name="dbuser">
     <label>Database Password</label>
    <input type='text' name="dbpass">
    <label>Database Name</label>
    <input type='text' name="dbname">
    <label>&nbsp;</label>
    <button type='submit' class='btn btn-primary'>Submit</button>
  </fieldset>
</form>
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

