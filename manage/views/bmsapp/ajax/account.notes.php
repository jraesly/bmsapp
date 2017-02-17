<?php
$cid=(int) $req_params['1'];
$cl=findOne('accounts',$cid);
$admin=findOne('admins',$aid);
if ($cl==FALSE) exit ('Client Not Found');
?>
<form action="clients.note.update.php" method="post" name="note">
<textarea id="note" class="input-block-level" name="note" rows="5"><?php echo $cl['notes']; ?></textarea>
<input type="button" name="update" value="Update" class="btn btn-primary" />
</form>
<script>
$("input[type='button'][name='update']").click(function(e){
$this = $(this);
$this.val("Processing...."), 
$this.prop('disabled', true),
$('#loading').css('visibility','visible');
$.ajax({
   type: "POST",
   url: "clients.note.update.php",
   data:{
    id: '<?php echo $cid; ?>',
    note: $('#note').val()
    },
   success: function(msg){
	   console.log(msg);
       $this.val("Update Again");
	   $this.prop('disabled', false);
	   $('#loading').css('visibility','hidden');
	   
   }
})
});
</script>