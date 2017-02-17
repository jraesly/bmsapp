<?php
$accid=(int) $req_params['1'];
$acc=findOne('coa',$accid);
notify();
?><div class="row">
    <div class="span6 offset1">

      <form name="update" method="post" action="<?php echo 'update.accounts'.EXT.'?__account='.$accid ; ?>" class="form-horizontal well">
        <fieldset>
          <legend><?php echo $_L['Edit_Account']; ?> #<?php echo $accid; ?></legend>
          <div class="control-group">
            <label class="control-label" for="accnumber"><?php echo $_L['account_number']; ?></label>
            <div class="controls">
              <input name="accnumber" type="text" class="input-small" id="accnumber" value="<?php echo $acc['accnumber']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="account"><?php echo $_L['account_name']; ?></label>
            <div class="controls">
              <input name="account" type="text" class="input-large" id="account" value="<?php echo $acc['account']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="type"><?php echo $_L['accountType']; ?></label>
            <div class="controls">
              <input name="type" type="text" class="input-large" id="type" value="<?php echo $acc['type']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="description"><?php echo $_L['account_description']; ?></label>
            <div class="controls">
              <textarea name="description" rows="3"><?php echo $acc['description']; ?></textarea>
            </div>
          </div>
           <div class="form-actions">
            <button type="submit" class="btn btn-primary"><?php echo $_L['saveChanges']; ?></button>
            <button type="reset" class="btn"><?php echo $_L['cancel']; ?></button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>