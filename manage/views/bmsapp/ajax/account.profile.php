<?php
$cid=(int) $req_params['1'];
$cl=findOne('accounts',$cid);
$admin=findOne('admins',$aid);
if ($cl==FALSE) exit ('Client Not Found');
?>
<?php notify(); ?>
<div class="span4">
      <h3><?php echo $_L['accountId'];?># <?php echo $cid; ?></h3>
      <address>
  <strong><?php  echo $cl['name']; ?></strong><br>
  <?php  echo $cl['company']; ?><br>
  <?php  echo $cl['address1'] .' '. $cl['address2']; ?><br>
   <?php  echo $cl['city'] .', '.$cl['state'].'-'.$cl['postcode']; ?><br>
  <abbr title="Phone">P:</abbr> <?php echo $cl['phone']; ?>
</address>
 <?php if ($cl['email']!=''){ ?>
<address>
  <strong><?php echo $_L['registaredEmailAddress'];?></strong><br>
  <a href="#sendEmail" data-toggle="modal"><?php  echo $cl['email']; ?></a>
</address>
<?php } ?>
<address>
  <strong><?php echo $_L['accountCredit'];?> : <?php echo $cl['balance'] ; ?></strong>
</address>
 <a  href="#addfund" role="button" class="btn btn-success" data-toggle="modal"><?php echo $_L['add_fund'] ?></a>

<?php if ($cl['email']!=''){ ?>
    <!-- Button to trigger modal -->
<a href="#sendEmail" role="button" class="btn btn-primary" data-toggle="modal"><?php echo $_L['sendEmail'];?></a>
<?php } ?>

 <a href="#Delete" role="button" class="btn btn-danger" data-toggle="modal"><?php echo $_L['deleteAccount'];?></a>
<!-- Modal -->
<?php if ($cl['email']!=''){ ?>
<div id="sendEmail" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 id="myModalLabel"><?php echo $_L['sendEmailTo'];?> <?php  echo $cl['email']; ?></h4>
  </div>
  <form action="send-email.php?_to=<?php echo $cid; ?>" method="post">
  <div class="modal-body">
    
    <div class="control-group">
	      <label class="control-label" for="subject"><?php echo $_L['subject']; ?></label>
	      <div class="controls">
	        <input type="text" class="input-xlarge" id="subject" name="subject">
	        
	      </div>
	</div>
    <div class="control-group">
	      <label class="control-label" for="input01"><?php echo $_L['message']; ?></label>
	      <div class="controls">
	        <textarea rows="6" name="message" class="input-xxlarge">Dear <?php  echo $cl['name']; ?>,


Thank You,
<?php echo $admin['signature']; ?></textarea>
	        
	      </div>
	</div>
  </div>
  
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo $_L['close']; ?></button>
    <button class="btn btn-primary"><?php echo $_L['send']; ?></button>
  </div>
  </form>
</div>
<?php } ?>
<div id="Delete" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 id="myModalLabel"><?php echo $_L['Delete_Account']; ?># <?php echo $cid; ?></h4>
  </div>
  <form action="delete-account.php?_cmd=<?php echo $cid; ?>" method="post">
  <div class="modal-body">
  <p>  <?php echo $_L['aresureDelAccount']; ?></p>
  </div>
  
  <div class="modal-footer">
    <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true"><?php echo $_L['no']; ?></button>
    <button class="btn btn-danger"><?php echo $_L['Yes_Delete']; ?></button>
  </div>
  </form>
</div>


<div id="addfund" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 id="myModalLabel"><?php echo $_L['add_fund']; ?></h4>
  </div>
  <form action="add-fund.php?_cmd=<?php echo $cid; ?>" method="post">
  <div class="modal-body">
        <div class="control-group">
        <label class="control-label" for="addfund"><?php echo $_L['amount']; ?></label>
        <div class="controls">
          <input type="text" class="input-xlarge" id="addfund" name="addfund">
          
        </div>
  </div>
  </div>
  
  <div class="modal-footer">
    <button class="btn btn-info" data-dismiss="modal" aria-hidden="true"><?php echo $_L['no']; ?></button>
    <button class="btn btn-primary"><?php echo $_L['add_fund']; ?></button>
  </div>
  </form>
</div>


    </div>