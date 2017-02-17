<?php
$xfooter='
<script type="text/javascript">
$(function () {
    $(\'#checkall\').on(\'click\', function () {
        $(".chkall").prop(\'checked\', this.checked);
    });
});
</script>
';


?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
    <?php notify(); ?>
<div class="row-fluid">
<div class="span12">
<h4><a href="administrator-roles.php" class="btn btn-primary"><i class="icon-list icon-white"></i> <?php echo $_L['Back_To_The_List']; ?></a></h4>
<h4><?php echo $_L['edit_role']; ?></h4>
<form action="edit.roles.php" method="post">
<div class="control-group">
    <label class="control-label" for="inputEmail"><?php echo $_L['email']; ?></label>
    <div class="controls">
      <input name="rname" type="text" id="inputEmail" value="<?php echo $rname; ?>">
    </div>
  </div>
<label class="checkbox"><input type="checkbox" id="checkall"><?php echo $_L['check_uncheck']; ?></label>
<hr>

<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="1" <?php if (isAccess($cmd,'1')) { echo 'checked="checked"'; } ?>><?php echo $_L['home']; ?></label>
<br>

<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="2" <?php if (isAccess($cmd,'2')) { echo 'checked="checked"'; } ?>><?php echo $_L['view_all_account']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="3" <?php if (isAccess($cmd,'3')) { echo 'checked="checked"'; } ?>><?php echo $_L['addNewClient']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="4" <?php if (isAccess($cmd,'4')) { echo 'checked="checked"'; } ?>><?php echo $_L['clientGroup']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="5" <?php if (isAccess($cmd,'5')) { echo 'checked="checked"'; } ?>><?php echo $_L['sendBulkEmail'] ?></label>
<br>

<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="6" <?php if (isAccess($cmd,'6')) { echo 'checked="checked"'; } ?>><?php echo $_L['transactions']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="7" <?php if (isAccess($cmd,'7')) { echo 'checked="checked"'; } ?>><?php echo $_L['invoices']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="8" <?php if (isAccess($cmd,'8')) { echo 'checked="checked"'; } ?>><?php echo $_L['addInvoices']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="9" <?php if (isAccess($cmd,'9')) { echo 'checked="checked"'; } ?>><?php echo $_L['recurringInvoices']; ?></label>
<br>

<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="10" <?php if (isAccess($cmd,'10')) { echo 'checked="checked"'; } ?>><?php echo $_L['orders']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="11" <?php if (isAccess($cmd,'11')) { echo 'checked="checked"'; } ?>><?php echo $_L['addNewOrders']; ?></label>
<br>

<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="12" <?php if (isAccess($cmd,'12')) { echo 'checked="checked"'; } ?>><?php echo $_L['incomeEntry']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="39" <?php if (isAccess($cmd,'12')) { echo 'checked="checked"'; } ?>><?php echo $_L['revenueGraph']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="13" <?php if (isAccess($cmd,'13')) { echo 'checked="checked"'; } ?>><?php echo $_L['expensesEntry']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="14" <?php if (isAccess($cmd,'14')) { echo 'checked="checked"'; } ?>><?php echo $_L['transfers']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="15" <?php if (isAccess($cmd,'15')) { echo 'checked="checked"'; } ?>><?php echo $_L['balanceSheet']; ?></label>
<br>

<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="16" <?php if (isAccess($cmd,'16')) { echo 'checked="checked"'; } ?>><?php echo $_L['kbCategouries']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="17" <?php if (isAccess($cmd,'17')) { echo 'checked="checked"'; } ?>><?php echo $_L['kbArticles']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="18" <?php if (isAccess($cmd,'18')) { echo 'checked="checked"'; } ?>><?php echo $_L['view_support_ticket']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="19" <?php if (isAccess($cmd,'19')) { echo 'checked="checked"'; } ?>><?php echo $_L['creatNewTickets']; ?></label>
<br>

<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="20" <?php if (isAccess($cmd,'20')) { echo 'checked="checked"'; } ?>><?php echo $_L['products_services']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="21" <?php if (isAccess($cmd,'21')) { echo 'checked="checked"'; } ?>><?php echo $_L['addministrators']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="22" <?php if (isAccess($cmd,'22')) { echo 'checked="checked"'; } ?>><?php echo $_L['addministratorsRole']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="23" <?php if (isAccess($cmd,'23')) { echo 'checked="checked"'; } ?>><?php echo $_L['paymentGatways']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="24" <?php if (isAccess($cmd,'24')) { echo 'checked="checked"'; } ?>><?php echo $_L['emailTemplates']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="25" <?php if (isAccess($cmd,'25')) { echo 'checked="checked"'; } ?>><?php echo $_L['supportDepartments']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="26" <?php if (isAccess($cmd,'26')) { echo 'checked="checked"'; } ?>><?php echo $_L['systemSettings']; ?></label>
<br>

<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="27" <?php if (isAccess($cmd,'27')) { echo 'checked="checked"'; } ?>><?php echo $_L['systemLogs']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="28" <?php if (isAccess($cmd,'28')) { echo 'checked="checked"'; } ?>><?php echo $_L['sentEmailLogs']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="29" <?php if (isAccess($cmd,'29')) { echo 'checked="checked"'; } ?>><?php echo $_L['systemStatus']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="30" <?php if (isAccess($cmd,'30')) { echo 'checked="checked"'; } ?>><?php echo $_L['databaseCleanUp']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="31" <?php if (isAccess($cmd,'31')) { echo 'checked="checked"'; } ?>><?php echo $_L['automatic_update']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="32" <?php if (isAccess($cmd,'32')) { echo 'checked="checked"'; } ?>><?php echo $_L['developerTools']; ?></label>
<br>

<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="33" <?php if (isAccess($cmd,'33')) { echo 'checked="checked"'; } ?>><?php echo $_L['toDo']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="34" <?php if (isAccess($cmd,'34')) { echo 'checked="checked"'; } ?>><?php echo $_L['stickyNote']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="35" <?php if (isAccess($cmd,'35')) { echo 'checked="checked"'; } ?>><?php echo $_L['noticeBoard']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="36" <?php if (isAccess($cmd,'36')) { echo 'checked="checked"'; } ?>><?php echo $_L['documentManagement']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="37" <?php if (isAccess($cmd,'37')) { echo 'checked="checked"'; } ?>><?php echo $_L['urlTracker']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="38" <?php if (isAccess($cmd,'38')) { echo 'checked="checked"'; } ?>><?php echo $_L['enquries']; ?></label>
<label class="checkbox"><input name="perms[]" type="checkbox" class="chkall" value="40" <?php if (isAccess($cmd,'39')) { echo 'checked="checked"'; } ?>><?php echo $_L['cms']; ?></label>
 <div class="form-actions">
    <input name="act" type="hidden" value="edit">
    <input name="rid" type="hidden" value="<?php echo $cmd; ?>">
  <button type="submit" name="submit" class="btn btn-primary"><?php echo $_L['save_changes']; ?></button>
</div>
</form>
</div>
</div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>