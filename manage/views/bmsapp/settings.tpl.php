<?php 
$xheader='<link rel="stylesheet" href="../assets/lib/chosen/chosen.css" />';
$xfooter=' <script src="../assets/js/sysfrm-ajax-loader.js"></script> 
<script src="../assets/js/modal-confirm.sysfrm.js"></script> 

';
require ('sections/header.tpl.php'); 
?>
    <div class="container">


<!-- Masthead
================================================== -->

  <div class="row">
    <div class="span11">
      <h1><?php echo $_L['settings'];?></h1>
    </div>
    <div class="span1" id="loading">
      <img  src="../assets/img/loader-blue.gif" alt="loading" />
    </div>
   
  </div>
  <?php notify(); ?>
  <div class="subnav">
    <ul class="nav nav-pills" id="navigation">
      <li><a href="#business.profile"><?php echo $_L['businessProfile'];?></a></li>
      <li><a href="#localization"><?php echo $_L['localization'];?></a></li>
      
      <li><a href="#theme"><?php echo $_L['theme'];?></a></li>
      <li><a href="#website-config"><?php echo $_L['websiteConfig'];?></a></li>
      <li><a href="#tax-vat"><?php echo $_L['tax/vat'];?></a></li>
      <li><a href="#automation"><?php echo $_L['automation'];?></a></li>
      <li><a href="#miscellaneous"><?php echo $_L['miscellanous'];?></a></li>
      
     <!-- <li><a href="#email.config">Email Config</a></li>-->
      
    </ul>
  </div>


    
    
   



<!-- Typography
================================================== -->
<div id="pageContent">
      
    </div>

    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>
