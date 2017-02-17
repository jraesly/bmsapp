<?php
require "boot.ajax.php";
$trid = _get('_trid');


 $trd= ORM::for_table('transactions')->find_one($trid);
?>
  <form id="form1" name="form1" method="post" action="tr<?php echo EXT; ?>">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3><?php echo $_L['transactionId'];?>- <?php echo $trd['id']; ?></h3>
  </div>
  <div class="modal-body">
    <div class="row-fluid">
      <div class="span12">
        <h4><?php echo $_L['areUsureDt'];?><?php echo $_L['transactionId'];?> ?</h4>
        <p><?php echo $_L['memo'];?> <input name="memo" type="text"  disabled="disabled" class="span12" id="memo" value="<?php echo $trd['memo']; ?>"></p>
        
       
        <p>* <?php echo $_L['transactionD'];?></p>
       
      </div>
    </div>
  </div>
<div class="modal-footer">
<input name="action" type="hidden" value="delete">
<input name="trid" type="hidden" value="<?php echo $trd['id']; ?>">
    <button type="button" data-dismiss="modal" class="btn"><?php echo $_L['close'];?></button>
    <button type="submit" name="delete" class="btn btn-danger"><?php echo $_L['transactionId'];?></button>
    
  </div>
  </form>
