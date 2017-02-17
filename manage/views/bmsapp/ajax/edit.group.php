<?php
require "boot.ajax.php";
$id = _get('_cmd');
 $grp= ORM::for_table('accgroups')->find_one($id);
?>
  <form id="form1" name="form1" method="post" action="client-groups<?php echo EXT; ?>">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3><?php echo $_L['groupId'];?> - <?php echo $grp['id']; ?></h3>
  </div>
  <div class="modal-body">
    <div class="row-fluid">
      <div class="span12">
        
        <p><?php echo $_L['groupName'];?> <input name="groupname" value="<?php echo $grp['groupname']; ?>" type="text" class="span12" id="memo"></p>
        
       
        
       
      </div>
    </div>
  </div>
<div class="modal-footer">
<input name="action" type="hidden" value="edit">
<input name="id" type="hidden" value="<?php echo $grp['id']; ?>">
    <button type="button" data-dismiss="modal" class="btn"><?php echo $_L['close'];?></button>
    <button type="submit" name="edit" class="btn btn-primary"><?php echo $_L['saveChanges'];?></button>
    
  </div>
  </form>
