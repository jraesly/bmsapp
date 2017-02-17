<?php
$rid = _get('_xclick');
$xheader='<link rel="stylesheet" type="text/css" href="../assets/css/list-style.css">

';
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

<ol class="rounded-list">
<?php
$ext = EXT;
$kbcs = ORM::for_table('knowledgebase')->select('id')->select('title')->where('catid', $rid)->order_by_asc('sorder')->find_many();

foreach ($kbcs as $kbc) {
	$id = $kbc['id'];
    $name = $kbc['title'];
	echo "<li><a href=\"a$ext?_i=$id\">$name</a></li>";
}


		  
		  ?>					
		</ol>
	
	</div>
    <?php include ('sections/footer.tpl.php'); ?>