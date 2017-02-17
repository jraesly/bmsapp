<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
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
    <?php echo $xheader; ?>    
</head>
<body style='background-color: #FBFBFB;'>
<div id='main-container'>
<div class='header'>
<div class="header-box wrapper">
<div class="hd-logo"><a href="#"><img src="../assets/uploads/logo.png" alt="Logo"/></a></div>
</div>

</div>
<div class="navbar">
    <div class="navbar-inner">
      <div class="container" style="width: auto;">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="home.php"><?php echo lc('BrandName'); ?></a>
        <div class="nav-collapse">
          <ul class="nav">
            <li class="active"><a href="index.php"><?php echo $_L['home'] ?></a></li>
           <li><a href="place-new-order.php"><?php echo $_L['order'] ?></a></li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_L['support'] ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="login.php?_after=create-ticket.php"><?php echo $_L['create_new_support_ticket']; ?></a></li>
                <li><a href="login.php?_after=my-tickets.php"><?php echo $_L['my_support_tickets']; ?></a></li>
                <li><a href="login.php?_after=kb.php"><?php echo $_L['knowledgebase']; ?></a></li>
              </ul>
            </li>
            <li><a href="notice-board.php"><?php echo $_L['notice_board']; ?></a></li>
           <li><a href="contact-us.php"><?php echo $_L['contact_us']; ?></a></li>
          </ul>
          <form class="navbar-search pull-left" method="post" action="search.php">
            <input type="text" class="search-query span2" name="keyword" placeholder="<?php echo $_L['search'] ?>">
          </form>
          <ul class="nav pull-right">
           <li class="divider-vertical"></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_L['account'] ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="login.php"><?php echo $_L['login'] ?></a></li>
                <li><a href="register.php"><?php echo $_L['create_new_account'] ?></a></li>
                <li><a href="forgot-pw.php"><?php echo $_L['reset_password'] ?></a></li>
              </ul>
            </li>
           
            
          </ul>
        </div><!-- /.nav-collapse -->
      </div>
    </div><!-- /navbar-inner -->
  </div>
      <!--  contents area start  -->
<div class="container-fluid">
  <div class="row-fluid"> 