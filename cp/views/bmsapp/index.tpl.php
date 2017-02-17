<?php
$xheader = '<link rel="stylesheet" href="../assets/lib/flexslider/flexslider.css" type="text/css" media="screen" /> ';
$xfooter = '<script defer src="../assets/lib/flexslider/jquery.flexslider.js"></script>
     <script type="text/javascript">
   
    $(window).load(function(){
      $(\'.flexslider\').flexslider({
        animation: "slide",
        start: function(slider){
          $(\'body\').removeClass(\'loading\');
        }
      });
    });
  </script>';

?>
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
            <li class="active"><a href="index.php">Home</a></li>
           <li><a href="place-new-order.php">Order</a></li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Support <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="login.php?_after=create-ticket.php">Create New Support Ticket</a></li>
                <li><a href="login.php?_after=my-tickets.php">My Support Tickets</a></li>
                <li><a href="login.php?_after=kb.php">Knowledgebase</a></li>
              </ul>
            </li>
            <li><a href="notice-board.php">Notice Board</a></li>
           <li><a href="contact-us.php">Contact Us</a></li>
          </ul>
          <form class="navbar-search pull-left" method="post" action="search.php">
            <input type="text" class="search-query span2" name="keyword" placeholder="Search">
          </form>
          <ul class="nav pull-right">
           <li class="divider-vertical"></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Create New Account</a></li>
                <li><a href="forgot-pw.php">Reset Password</a></li>
              </ul>
            </li>
           
            
          </ul>
        </div><!-- /.nav-collapse -->
      </div>
    </div><!-- /navbar-inner -->
  </div>
      <!--  contents area start  -->
<div class="container-fluid">
 
      <!--Body content-->
      
     

      
      <?php  echo $cms['contents']; ?>
     

</div>
   <!--  contents area end  -->
</div>
<div class="footer"><?php echo $footerTxt; ?><br />
<br />
</div>
<script src="../assets/js/jquery.min.js"
        type="text/javascript"></script>
        <script type="text/javascript" src="views/bmsapp/js/custom.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
        <?php echo $xfooter; ?>
    </body>
</html>

