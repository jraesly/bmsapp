<?php
$xheader='<link href="../lib/pnp/board/style.css" rel="stylesheet" type="text/css" />
';
$aname= findOne('admins',$aid); 
$aaname = $aname['username'];
$afname = $aname['fname'];
$alname = $aname['lname'];
$ffname = $afname.' '.$alname;
$xfooter = "<script language=\"JavaScript\" type=\"text/javascript\" src=\"../lib/pnp/board/js/jquery.timer.js\"></script>
<script language=\"JavaScript\" type=\"text/javascript\" src=\"../assets/js/sysfrm-board.js.php?_x=$ffname\"></script>
";


?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
    <div class="row-fluid">
    <div class="span12">
    <a href="manage-notice-board.php" class="btn btn-warning"><i class="icon-list icon-white"></i> <?php echo $_L['mange/delete'];?></a>
    <h4>Post New Message </h4>
    </div>
    </div>
    <form id="form" name="form" action="#" method="post">
   
    <div class="row-fluid">
    
   <div class="span6 well">
   
        <textarea name="message" id="message" class="input-block-level"
        placeholder="Type in your message" rows="5"></textarea>
        <h6 class="pull-right">(Character count: <span id="count">0</span>)</h6>
        <button id="submit" class="btn btn-primary" type="submit"> <?php echo $_L['post/new/messages'];?></button>
    
</div>
   <div class="span12"><h4 id="error"><?php echo $_L['postMessages'];?></h4></div>
  <div class="span12"><div id="messages" class="messages">
<!-- posted messages display here -->
</div></div>
</div>
</form>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>