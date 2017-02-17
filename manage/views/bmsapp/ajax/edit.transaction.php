<?php
require "boot.ajax.php";
$trid = _get('_trid');
 $trd= ORM::for_table('transactions')->find_one($trid);
?>
  <form id="form1" name="form1" method="post" action="tr.php">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3><?php echo $_L['transactionId'];?> - <?php echo $trd['id']; ?></h3>
  </div>
  <div class="modal-body">
    <div class="row-fluid">
      <div class="span12">
        <p><?php echo $_L['date'];?> <input name="date" value="<?php echo $trd['date']; ?>" type="text" id="date_m" class="span12"></p>
        <p><?php echo $_L['memo'];?> <input name="memo" value="<?php echo $trd['memo']; ?>" type="text" class="span12" id="memo"></p>
        
       
        
       
      </div>
    </div>
  </div>
<div class="modal-footer">
<input name="action" type="hidden" value="edit">
<input name="trid" type="hidden" value="<?php echo $trd['id']; ?>">
    <button type="button" data-dismiss="modal" class="btn"><?php echo $_L['close'];?></button>
    <button type="submit" name="edit" class="btn btn-primary"><?php echo $_L['saveChanges'];?></button>
    
  </div>
  </form>
