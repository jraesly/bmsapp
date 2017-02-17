<?php
$rid = _get('_xClick');
$xheader = '<link rel="stylesheet" href="../lib/pnp/redactor/redactor/redactor.css" />

';
$xfooter = '
 <script src="../lib/pnp/redactor/redactor/redactor.min.js"></script>

	<script type="text/javascript">
	$(document).ready(
		function()
		{
			$(\'#redactor_content\').redactor({
				imageUpload: \'image_upload.php\',
				minHeight: 200 // pixels
			});
		}
	);
	</script> 
	<script>
$("input[type=\'button\'][name=\'update\']").click(function(e){
$this = $(this);
$this.val("Processing...."), 
$this.prop(\'disabled\', true),
$(\'#loading\').css(\'visibility\',\'visible\');
$.ajax({
   type: "POST",
   url: "update.ticket.notes.php",
   data:{
    id: \'' . $rid . '\',
    note: $(\'#note\').val()
    },
   success: function(msg){
	   console.log(msg);
       $this.val("Update Again");
	   $this.prop(\'disabled\', false);
	   $(\'#loading\').css(\'visibility\',\'hidden\');
	   
   }
})
});
</script>
';
$cmd = ORM::for_table('tickets')->find_one($rid);
$subject = $cmd['subject'];
$iuserid = $cmd['userid'];
$imessage = $cmd['message'];
$idate = $cmd['date'];


$date = strtotime($idate);
$idate = date($sys_date, $date);

$iname = $cmd['name'];
$iadmin = $cmd['admin'];
$notes = $cmd['notes'];
$status = $cmd['status'];
$aread = $cmd['aread'];
if ($aread != 'Yes') {
    $rcmd = ORM::for_table('tickets')->find_one($rid);
    $rcmd->aread = 'Yes';
    $rcmd->save();
}
$did = $cmd['did'];
$depq = ORM::for_table('ticketdepartments')->find_one($did);
$dep = $depq['name'];
$iimg = '../assets/img/user-icon.png';
if ($iadmin != '0') {
    $iimg = '../assets/uploads/logo.png';
}
?>
<?php require('sections/header.tpl.php'); ?>
    <div class="container">
        <div class="row-fluid">
            <?php notify(); ?>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div id="tab" class="btn-group" data-toggle="buttons-radio">
                    <a href="tickets.php" class="btn btn-primary"><?php echo $_L['Back_To_The_List']; ?></a>
                    <a href="#reply" class="btn btn-success" data-toggle="tab"><?php echo $_L['Reply']; ?></a>
                    <a href="#department" class="btn btn-info" data-toggle="tab"><?php echo $_L['Department']; ?></a>
                    <a href="#notes" class="btn btn-primary" data-toggle="tab"><?php echo $_L['addNote']; ?></a>
                    <?php
                    if ($status != 'Closed') {
                        ?>
                        <a href="cmd.tickets.php?<?php echo "act=closeThis&amp;_xClick=$rid"; ?>"
                           class="btn btn-warning"><?php echo $_L['Mark_Closed'];?></a>
                    <?php
                    }
                    ?>
                    <a href="cmd.tickets.php?<?php echo "act=delThis&amp;_xClick=$rid"; ?>"
                       class="btn btn-danger"><?php echo $_L['Delete']; ?></a>
                </div>

                <div class="tab-content">

                    <div class="tab-pane active" id="reply">
                        <form method="post" action="cmd.tickets.php">
                            <fieldset>
                                <legend><?php echo $subject; ?></legend>
                                <textarea rows="6" class="input-block-level" id="redactor_content"
                                          name="message"></textarea>
                                <input name="userid" type="hidden" value="<?php echo $iuserid; ?>">
                                <input name="rid" type="hidden" value="<?php echo $rid; ?>">
                                <input name="cid" type="hidden" value="<?php echo $iuserid; ?>">
                                <button type="submit" name="submit" value="reply"
                                        class="btn btn-primary"><?php echo $_L['Reply_Ticket']; ?></button>
                            </fieldset>
                        </form>
                    </div>
                    <div class="tab-pane" id="notes"><?php
                        ?>
                        <h4><?php echo $_L['Ticket_Notes']; ?></h4>

                        <form action="clients.note.update.php" method="post" name="note">
                            <textarea id="note" class="input-block-level" name="note"
                                      rows="5"><?php echo $notes; ?></textarea>
                            <input type="button" name="update" value="Update" class="btn btn-primary"/>
                        </form>
                    </div>
                    <div class="tab-pane" id="department">
                        <form method="post" action="cmd.tickets.php">
                            <fieldset>
                                <legend><?php echo $subject; ?></legend>
                                <label><?php echo $_L['Change_Department']; ?></label>
                                <label>
                                    <select name="did">
                                        <?php
                                        $accgroups = ORM::for_table('ticketdepartments')->where('show', 'Yes')->order_by_asc('order')->find_many();

                                        foreach ($accgroups as $accgroup) {
                                            $id = $accgroup['id'];
                                            $name = $accgroup['name'];
                                            $xthis = '';
                                            if ($dep == "$name") {
                                                $xthis = 'selected="selected"';
                                            }
                                            echo "<option value=\"$id\" $xthis>$name</option>";
                                        }

                                        ?>
                                    </select>
                                </label>
                                <input name="rid" type="hidden" value="<?php echo $rid; ?>">
                                <button type="submit" name="submit" value="cdep"
                                        class="btn btn-primary"><?php echo $_L['submit']; ?></button>
                            </fieldset>
                        </form>
                    </div>
                    <div class="tab-pane" id="contact"> <?php echo $_L['Contact']; ?></div>
                </div>
                <div class="well"><p><?php echo $_L['status']; ?>:
                        <span class="label label-info"><?php echo $status; ?></span>
                        | <?php echo $_L['Department']; ?>:
                        <span class="label label-info"><?php echo $dep; ?></span>
                        | <i class="icon-user"></i> <a
                            href="account-profile<?php echo EXT; ?>?__account=<?php echo $iuserid; ?>#account.profile/<?php echo $iuserid; ?>"><?php echo $iname; ?></a>
                        | <i class="icon-calendar"></i> <?php echo $idate; ?>

                    </p></div>
                <table class="table table-bordered table-striped">


                    <tbody>
                    <?php
                    $items = ORM::for_table('ticketreplies')->where('tid', $rid)->order_by_desc('date')->find_many();
                    foreach ($items as $item) {
                        $userid = $item['userid'];
                        $name = $item['name'];
                        $message = $item['message'];
                        $date = $item['date'];


                        $cdate = strtotime($date);
                        $date = date($sys_date, $cdate);

                        $admin = $item['admin'];
                        $img = '../assets/img/user-icon.png';
                        if ($admin != '0') {
                            $img = '../assets/uploads/logo.png';
                        }
                        echo "
	<tr>
                <td>
                <img src=\"$img\">
                 <h4>$name</h4>
                $date
                </td>
                <td>$message</td>
              </tr>
	";
                    }
                    ?>
                    <tr>
                        <td>
                            <img src="<?php echo $iimg; ?>">
                            <h4><?php echo $iname; ?></h4>
                            <?php echo $idate; ?>
                        </td>
                        <td><?php echo $imessage; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /container -->
<?php require('sections/footer.tpl.php'); ?>