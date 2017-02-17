<?php
$xheader='
<style>
body {
			background: #eac996 url(../assets/img/wood.png);
		}

</style>
<link rel="stylesheet" type="text/css" href="../lib/pnp/stickynote/styles.css" />
<link rel="stylesheet" type="text/css" href="../lib/pnp/stickynote/fancybox/jquery.fancybox-1.2.6.css" media="screen" />




';
$xfooter='<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="../lib/pnp/stickynote/fancybox/jquery.fancybox-1.2.6.pack.js"></script>
<script type="text/javascript" src="../lib/pnp/stickynote/script.js"></script>
';

?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
    <a id="addButton" class="btn btn-primary" href="sticky.add.php"><?php echo $_L['addNote'];?></a>
<div id="main">
	
    
	<?php echo $notes?>
    
</div>
    </div><!-- /container -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/common.js"></script>
 <?php echo $xfooter; ?>
  </body>
</html>
