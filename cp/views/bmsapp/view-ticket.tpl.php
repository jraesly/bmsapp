<?php
$rid = _get('_xClick');
$xheader = '<link rel="stylesheet" href="../lib/pnp/redactor/redactor/redactor.css" />

';
$xfooter = '<script src="../lib/pnp/redactor/redactor/redactor.min.js"></script>

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
	</script>';
$cmd = ORM::for_table('tickets')->find_one($rid);
$subject = $cmd['subject'];
$iuserid = $cmd['userid'];
if ($iuserid != $cid) {
    exit;
}
$iemail = $cmd['email'];
$imessage = $cmd['message'];
$idate = $cmd['date'];


$date = strtotime($idate);
$idate = date($sys_date, $date);

$iname = $cmd['name'];
$iadmin = $cmd['admin'];
$notes = $cmd['notes'];
$status = $cmd['status'];
$cread = $cmd['cread'];
if ($cread != 'Yes') {
    $rcmd = ORM::for_table('tickets')->find_one($rid);
    $rcmd->cread = 'Yes';
    $rcmd->save();
}
$did = $cmd['did'];
$depq = ORM::for_table('ticketdepartments')->find_one($did);
$dep = $depq['name'];
$iimg = '../assets/img/user-icon.png';
if ($iadmin != '0') {
    $iimg = '../assets/uploads/logo.png';
}
include('sections/header.tpl.php');
?>
<?php notify(); ?>

<div class="span12">
    <form method="post" action="cmd.tickets.php">
        <fieldset>
            <legend><?php echo $subject; ?></legend>
            <textarea rows="6" class="input-block-level" id="redactor_content" name="message"></textarea>
            <input name="userid" type="hidden" value="<?php echo $iuserid; ?>">
            <input name="rid" type="hidden" value="<?php echo $rid; ?>">
            <input name="cid" type="hidden" value="<?php echo $iuserid; ?>">
            <button type="submit" name="submit" value="reply" class="btn btn-primary">Reply Ticket</button>
        </fieldset>
    </form>
    <div class="well"><p>Status:
            <span class="label label-info"><?php echo $status; ?></span>
            | Department:
            <span class="label label-info"><?php echo $dep; ?></span>
            | <i class="icon-envelope"></i> <?php echo $iemail; ?>
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




<?php include('sections/footer.tpl.php'); ?>


