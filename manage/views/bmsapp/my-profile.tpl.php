<?php
$d = ORM::for_table('admins')->find_one($aid);
?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
    <div class="row-fluid">
    <?php notify(); ?>
    </div>
<div class="row-fluid">
<div class="span4 well">
<form method="post" action="my-profile<?php echo EXT; ?>">
  <fieldset>
    <legend><?php echo $_L['Edit_My_Profile'];?></legend>
     <label><?php echo $_L['firstName'];?></label>
    <input name="fname" type="text" class="input-xlarge" id="fname" value="<?php echo $d['fname']; ?>">
     <label><?php echo $_L['Last_Name'];?></label>
    <input name="lname" type="text" class="input-xlarge" id="lname" value="<?php echo $d['lname']; ?>">
    <label><?php echo $_L['email'];?></label>
    <input name="email" type="text" class="input-xlarge" id="email" value="<?php echo $d['email']; ?>">
    <label><?php echo $_L['userName'];?></label>
    <input name="username" type="text" class="input-xlarge" disabled="disabled" id="username" value="<?php echo $d['username']; ?>">
    <label><?php echo $_L['password'];?></label>
    <input name="password" type="text" class="input-xlarge" id="password" value="--Click To Edit--" onblur="if (this.value == '') {this.value = '--Click To Edit--';}"
 onfocus="if (this.value == '--Click To Edit--') {this.value = '';}">
    <label><?php echo $_L['Ticket_Signature'];?></label>
    
    <textarea  class="input-xlarge" name="signature" cols="" rows="4"><?php echo $d['signature']; ?></textarea>
    <div class="form-actions">
    <input name="action" type="hidden" value="edit">
  <button type="submit" name="submit" class="btn btn-primary"><?php echo $_L['submit'];?></button>
  <button type="reset" class="btn"><?php echo $_L['cancel'];?></button>
</div>
  </fieldset>
</form>
</div>

</div>

    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>