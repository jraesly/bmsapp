<?php 
$xfooter=' <script src="../assets/js/sysfrm-ajax-loader.js"></script> ';
require ('sections/header.tpl.php'); 
?>
    <div class="container">


<!-- Masthead
================================================== -->

  <div class="row">
    <div class="span11">
      <h1><?php  echo $acc['account']; ?></h1>
    </div>
    <div class="span1" id="loading">
      <img  src="../assets/img/loader-blue.gif" alt="loading" />
    </div>
   
  </div>
  <div class="subnav">
    <ul class="nav nav-pills" id="navigation">
      <li><a href="#accounts.summary/<?php echo $accid; ?>"><?php echo $_L['Summary'];?></a></li>
      <li><a href="#accounts.edit/<?php echo $accid; ?>"><?php echo $_L['Edit'];?></a></li>
      <li><a href="#accounts.transaction/<?php echo $accid; ?>"><?php echo $_L['transactions'];?></a></li>
     
    </ul>
  </div>




<!-- Typography
================================================== -->
<div id="pageContent">
      
    </div>

    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>
