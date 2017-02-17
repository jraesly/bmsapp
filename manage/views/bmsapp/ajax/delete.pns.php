<?php
require "boot.ajax.php";
$trid = _get('_cmd');


 $trd= ORM::for_table('products')->find_one($trid);
?>
  <form id="form1" name="form1" method="post" action="pns<?php echo EXT; ?>">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3><?php echo $_L['productServicePns']; ?>- <?php echo $trd['id']; ?></h3>
  </div>
  <div class="modal-body">
    <div class="row-fluid">
      <div class="span12">
        <h4><?php echo $_L['areUsureDg']; ?></h4>
        <p><?php echo $_L['memo']; ?> <input name="name" type="text"  disabled="disabled" class="span12" id="name" value="<?php echo $trd['name']; ?>"></p>
       
      </div>
    </div>
  </div>
<div class="modal-footer">
<input name="action" type="hidden" value="delete">
<input name="trid" type="hidden" value="<?php echo $trd['id']; ?>">
    <button type="button" data-dismiss="modal" class="btn"><?php echo $_L['Close']; ?> </button>
    <button type="submit" name="delete" class="btn btn-danger"><?php echo $_L['deleteThisProduct']; ?> </button>
    
  </div>
  </form>
