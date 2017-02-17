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
        <a class="brand" href="<?php echo 'home'.EXT; ?>"><?php echo lc('BrandName'); ?></a>
        <div class="nav-collapse">
          <ul class="nav">
            <li class="active"><a href="<?php echo 'home'.EXT; ?>"><?php echo $_L['home'] ?></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_L['order'] ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo 'order'.EXT; ?>"><?php echo $_L['products_services']; ?></a></li>
                 <li class="divider"></li>
               
                <li><a href="<?php echo 'my-orders'.EXT; ?>"><?php echo $_L['my_active_services']; ?></a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_L['billing']; ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo 'my-transactions'.EXT; ?>"><?php echo $_L['my_transactions']; ?></a></li>
                <li><a href="<?php echo 'my-invoices'.EXT; ?>"><?php echo $_L['my_invoices']; ?></a></li>
                <li><a href="<?php echo 'add-fund'.EXT; ?>"><?php echo $_L['add_fund']; ?></a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_L['support'] ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo 'create-ticket'.EXT; ?>"><?php echo $_L['create_new_support_ticket']; ?></a></li>
                <li><a href="<?php echo 'my-tickets'.EXT; ?>"><?php echo $_L['my_support_tickets']; ?></a></li>
                <li><a href="<?php echo 'kb'.EXT; ?>"><?php echo $_L['knowledgebase']; ?></a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_L['my_account']; ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
              <li><a href="<?php echo 'my-emails'.EXT; ?>"><?php echo $_L['my_emails']; ?></a></li>
                <li><a href="<?php echo 'edit-profile'.EXT; ?>"><?php echo $_L['edit_profile']; ?></a></li>
               
                <li class="divider"></li>
                <li><a href="<?php echo 'logout'.EXT; ?>"><?php echo $_L['logout']; ?></a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-search pull-left" method="post" action="search<?php echo EXT; ?>">
            <input type="text" class="search-query span2" name="keyword" placeholder="<?php echo $_L['search']; ?>">
          </form>
          <ul class="nav pull-right">
           <li class="divider-vertical"></li>
            <li><a rel="tooltip" href="<?php echo 'logout'.EXT; ?>" title="Visit Main Website"><?php echo $_L['logout']; ?> <i class="icon-share-alt icon-white"></i></a></li>
           
            
          </ul>
        </div><!-- /.nav-collapse -->
      </div>
    </div><!-- /navbar-inner -->
  </div>
    <!--  contents area start  -->
<div class="container-fluid">
  <div class="row-fluid">