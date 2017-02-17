<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
    <?php notify(); ?>
<div class="row-fluid">
<div class="span12 well">
<h4><?php echo $_L['databaseCleanUp'];?></h4>
<div class="alert alert-block">
  <h4><?php echo $_L['systgemLogsTable'];?>
    <a href="?_cleanup=logs" class="btn btn-warning btn-large pull-right"><?php echo $_L['cont'];?></a>
  </h4>
  <p><?php echo $_L['systemLogsTabled'];?>.</p>
</div>
<div class="alert alert-block">
  <h4><?php echo $_L['emailLogsTable'];?>
    <a href="?_cleanup=email_logs" class="btn btn-warning btn-large pull-right"><?php echo $_L['cont'];?></a>
  </h4>
  <p><?php echo $_L['emailLogsTabled'];?>.</p>
</div>
<div class="alert alert-block">
  <h4><?php echo $_L['emailLogsTable'];?>.
    <a href="?_cleanup=notice-board" class="btn btn-warning btn-large pull-right"><?php echo $_L['cont'];?></a>
  </h4>
  <p><?php echo $_L['emailLogsTabled'];?>.</p>
</div>

<div class="alert alert-block">
  <h4><?php echo $_L['enquiriesLogsTable'];?>
    <a href="?_cleanup=enquiries" class="btn btn-warning btn-large pull-right"><?php echo $_L['cont'];?></a>
  </h4>
  <p><?php echo $_L['enquiriesTabled'];?>.</p>
</div>

</div>
</div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>