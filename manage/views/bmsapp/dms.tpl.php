<?php
$xheader='<link rel="stylesheet" type="text/css" media="screen" href="../lib/pnp/dms/css/start/jquery-ui-1.10.1.custom.css">
		<link rel="stylesheet" type="text/css" media="screen" href="../lib/pnp/dms/css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="../lib/pnp/dms/css/theme.css">
		

';
$xfooter = '
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script type="text/javascript" src="../lib/pnp/dms/js/elfinder.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			$().ready(function() {
				var elf = $(\'#elfinder\').elfinder({
					url : \'../lib/pnp/dms/php/connector.php\'  
				}).elfinder(\'instance\');
			});
		</script>
';


?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
    <div class="row-fluid">
<div class="span12">
<div id="elfinder"></div>

</div>
</div>
     </div><!-- /container -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/common.js"></script>
 <?php echo $xfooter; ?>
  </body>
</html>
