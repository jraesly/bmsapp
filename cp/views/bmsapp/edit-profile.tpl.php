<?php
$cl=findOne('accounts',$cid);
 include ('sections/header.tpl.php'); 
 ?>
  <div class="span10 offset1">

      <form name="update" method="post" action="<?php echo 'edit-profile'.EXT; ?>" class="form-horizontal well">
        <fieldset>
          <legend><?php echo $_L['edit_profile']; ?></legend>
          <div class="control-group">
            <label class="control-label" for="fname"><?php echo $_L['account_name']; ?></label>
            <div class="controls">
              <input name="name" type="text" class="input-xlarge" id="name" value="<?php echo $cl['name']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="company"><?php echo $_L['company_name']; ?></label>
            <div class="controls">
              <input type="text" name="company" class="input-xlarge" id="company" value="<?php echo $cl['company']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="email"><?php echo $_L['email_address']; ?></label>
            <div class="controls">
              <input type="text" name="email" readonly class="input-xlarge" id="email" value="<?php echo $cl['email']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password"><?php echo $_L['password']; ?></label>
            <div class="controls">
              <input type="text" name="password" class="input-xlarge" id="password" value="--Click To Edit--" onblur="if (this.value == '') {this.value = '--Click To Edit--';}"
 onfocus="if (this.value == '--Click To Edit--') {this.value = '';}">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="address1"><?php echo $_L['address_line_1']; ?></label>
            <div class="controls">
              <input type="text" name="address1" class="input-xlarge" id="address1" value="<?php echo $cl['address1']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="address2"><?php echo $_L['address_line_2']; ?></label>
            <div class="controls">
              <input type="text" name="address2" class="input-xlarge" id="address2" value="<?php echo $cl['address2']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="city"><?php echo $_L['city']; ?></label>
            <div class="controls">
              <input type="text" name="city" class="input-xlarge" id="city" value="<?php echo $cl['city']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="state"><?php echo $_L['state']; ?> / <?php echo $_L['region']; ?></label>
            <div class="controls">
              <input type="text" name="state" class="input-xlarge" id="state" value="<?php echo $cl['state']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="postcode"><?php echo $_L['postcode']; ?></label>
            <div class="controls">
              <input type="text" name="postcode" class="input-xlarge" id="postcode" value="<?php echo $cl['postcode']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="country"><?php echo $_L['country']; ?></label>
            <div class="controls">
               <input type="text" name="country" disabled="disabled" class="input-xlarge" id="postcode" value="<?php echo $cl['country']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="phone"><?php echo $_L['phone_number']; ?></label>
            <div class="controls">
              <input type="text" name="phone" class="input-xlarge" id="phone" value="<?php echo $cl['phone']; ?>">
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" name="submit" class="btn btn-primary"><?php echo $_L['save_changes']; ?></button>
            <button type="reset" class="btn"><?php echo $_L['cancel']; ?></button>
          </div>
        </fieldset>
      </form>
    </div>
    <?php include ('sections/footer.tpl.php'); ?>