<?php 
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
      <h1><?php  echo $cl['name']; ?></h1>
    </div>
    <div class="span1" id="loading">
      <img  src="../assets/img/loader-blue.gif" alt="loading" />
    </div>
   
  </div>
  <div class="subnav">
    <ul class="nav nav-pills" id="navigation">
      <li><a href="#account.profile/<?php echo $cid; ?>"><?php echo $_L['Profile'];?></a></li>
      <li><a href="#account.edit/<?php echo $cid; ?>"><?php echo $_L['Edit'];?></a></li>
      <li><a href="#account.transactions/<?php echo $cid; ?>/1"><?php echo $_L['transactions'];?></a></li>
      <li><a href="#account.orders/<?php echo $cid; ?>/1"><?php echo $_L['orders'];?></a></li>
       <li><a href="#account.invoices/<?php echo $cid; ?>/1"><?php echo $_L['invoices'];?></a></li>
      <li><a href="#account.tickets/<?php echo $cid; ?>/1"><?php echo $_L['tickets'];?></a></li>
      <li><a href="#account.emails/<?php echo $cid; ?>/1"><?php echo $_L['Emails'];?></a></li>
      <li><a href="#account.notes/<?php echo $cid; ?>/1"><?php echo $_L['note'];?></a></li>
      <li><a href="#account.logs/<?php echo $cid; ?>/1"><?php echo $_L['Logs'];?></a></li>
    </ul>
  </div>




<!-- Typography
================================================== -->
<div id="pageContent">
      
    </div>

    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>
