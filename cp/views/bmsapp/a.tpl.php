<?php
$rid = _get('_i');
$art = ORM::for_table('knowledgebase')->find_one($rid);
			$arttitle = $art['title'];
			$arttxt = $art['article'];
 
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo lc('WebsiteTitle'); ?></title>
     <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
	<link type='text/css' href='views/bmsapp/css/cstyle.css' rel='stylesheet' />
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="../assets/css/clientstyle.css" rel="stylesheet">
    
<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
        <script type="text/javascript" src="views/bmsapp/js/custom.js"></script>
        
        <?php echo $xheader; ?>

</head>
<body style='background-color: #FBFBFB;'>
<div id='main-container'>
<div class='header'>
<div class="header-box wrapper">
<div class="hd-logo"><a href="#"><img src="../assets/uploads/logo.png" alt="Logo"/></a></div>
</div>

</div>

    <!--  contents area start  -->
<div class="container-fluid">
  <div class="row-fluid">
   <div class="span12">
<h4> <?php echo $arttitle; ?></h4>
<p>
<?php echo $arttxt; ?> 

</p>
	</div>
    <?php include ('sections/footer.tpl.php'); ?>