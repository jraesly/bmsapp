<?php
require "boot.ajax.php";
$trid = _get('_cmd');


 $trd= ORM::for_table('admins')->find_one($trid);
?>
  <form id="form1" name="form1" method="post" action="administrators<?php echo EXT; ?>">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3><?php echo $_L['adminId']; ?> - <?php echo $trd['id']; ?></h3>
  </div>
  <div class="modal-body">
    <div class="row-fluid">
      <div class="span12">
        <h4><?php echo $_L['areUsure']; ?> ?</h4>
        <p><?php echo $_L['username']; ?> <input name="username" type="text"  disabled="disabled" class="span12" id="username" value="<?php echo $trd['username']; ?>"></p>
        
       
       
       
      </div>
    </div>
  </div>
<div class="modal-footer">
<input name="action" type="hidden" value="delete">
<input name="id" type="hidden" value="<?php echo $trd['id']; ?>">
    <button type="button" data-dismiss="modal" class="btn"><?php echo $_L['close']; ?></button>
    <button type="submit" name="delete" class="btn btn-danger"><?php echo $_L['deleteAccount']; ?></button>
    
  </div>
  </form>
