<?php
require "boot.ajax.php";
$trid = _get('_cmd');
 $trd= ORM::for_table('products')->find_one($trid);
?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3><?php echo $trd['name']; ?></h3>
  </div>
  <div class="modal-body">
    <div class="row-fluid">
      <div class="span12">
        
        
        
       <p><?php echo $trd['description']; ?>
        </p>
        
   <h3>Price: <?php echo $trd['price']; ?>/= </h3>
          
   

      </div>
    </div>
  </div>
<div class="modal-footer">
<input name="action" type="hidden" value="edit">
<input name="trid" type="hidden" value="<?php echo $trd['id']; ?>">
    <button type="button" data-dismiss="modal" class="btn">Close</button>
    <button type="submit" name="edit" class="btn btn-inverse">Buy It Now</button>
    
  </div>