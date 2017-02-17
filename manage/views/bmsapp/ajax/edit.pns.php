<?php
require "boot.ajax.php";
$trid = _get('_cmd');
 $trd= ORM::for_table('products')->find_one($trid);
 $status = $trd['status'];
 if ($status=='Show'){
$cs = ' checked="checked"';	
}
?>
  <form id="form1" name="form1" method="post" action="pns.php">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3><?php echo $_L['productServiceId'];?> - <?php echo $trd['id']; ?></h3>
  </div>
  <div class="modal-body">
    <div class="row-fluid">
      <div class="span12">
        
        <p><?php echo $_L['productTitle'];?><input name="name" value="<?php echo $trd['name']; ?>" type="text" class="span12" id="name"></p>
        
       <p><?php echo $_L['productDescription'];?> <textarea name="description" id="description-<?php echo $trid; ?>" rows="5" class="redactor span12"><?php echo $trd['description']; ?></textarea>
        </p>
         <label><?php echo $_L['price'];?></label>
    <input name="price" type="text" class="input-small" value="<?php echo $trd['price']; ?>" id="price">
          
    <label><?php echo $_L['showInclientPortal'];?></label>
    <input name="status" type="checkbox" class="common" id="switch1" value="Active" <?php echo $cs; ?> />

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
  <script type="text/javascript">
$(document).ready(
	function()
	{
		$('.redactor').redactor();
	}
);
</script>