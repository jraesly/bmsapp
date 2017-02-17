<?php
require "boot.ajax.php";
$id = _get('_cmd');
if ($id=='1'){
	exit ("");

}
 $adm= ORM::for_table('admins')->find_one($id);
?>
  <form id="form1" name="form1" method="post" action="administrators.php">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3><?php echo $_L['adminId'];?> - <?php echo $adm['id']; ?></h3>
  </div>
  <div class="modal-body">
    <div class="row-fluid">
      <div class="span12">
        <p><?php echo $_L['firstName'];?> <input name="fname" value="<?php echo $adm['fname']; ?>" type="text" class="span12" id="fname"></p>
        <p><?php echo $_L['lastName'];?> <input name="lname" value="<?php echo $adm['lname']; ?>" type="text" class="span12" id="lname"></p>
        <p><?php echo $_L['email'];?> <input name="email" value="<?php echo $adm['email']; ?>" type="text" class="span12" id="email"></p>
        <p><?php echo $_L['userName'];?> <input name="username" value="<?php echo $adm['username']; ?>" type="text" disabled="disabled" class="span12" id="username"></p>
        <p><?php echo $_L['password'];?><input type="text" name="password" class="span12" id="password" value="--Click To Edit--" onblur="if (this.value == '') {this.value = '--Click To Edit--';}"
 onfocus="if (this.value == '--Click To Edit--') {this.value = '';}"></p>
      <p><?php echo $_L['userName'];?><select class="span12" name="roleid">
   <?php
		  $accgroups = ORM::for_table('adminroles')->find_many();
foreach ($accgroups as $accgroup) {
	$id = $accgroup['id'];
    $name = $accgroup['name'];
	$selected = '';
	if ($adm['roleid']==$id){
		$selected = 'selected="selected"';
	}
	echo "<option value=\"$id\" $selected>$name</option>";
}
		  
		  ?>
 
</select></p>   
       
        
       
      </div>
    </div>
  </div>
<div class="modal-footer">
<input name="action" type="hidden" value="edit">
<input name="id" type="hidden" value="<?php echo $adm['id']; ?>">
    <button type="button" data-dismiss="modal" class="btn"><?php echo $_L['close'];?></button>
    <button type="submit" name="edit" class="btn btn-primary"><?php echo $_L['saveChanges'];?></button>
    
  </div>
  </form>
