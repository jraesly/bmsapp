<?php
$xheader='<link rel="stylesheet" type="text/css" href="../lib/pnp/todo/themes/default/style.css?v=1.4.2" media="all" />


<link rel="stylesheet" type="text/css" href="../lib/pnp/todo/themes/default/print.css?v=1.4.2" media="print" />

';
$xfooter= '
<script type="text/javascript" src="../lib/pnp/todo/jquery/jquery-ui-1.8.7.custom.min.js"></script>
<script type="text/javascript" src="../lib/pnp/todo/jquery/jquery.autocomplete-1.1.js"></script>
<script type="text/javascript" src="../lib/pnp/todo/mytinytodo.js?v=1.4.2"></script>
<script type="text/javascript" src="../lib/pnp/todo/mytinytodo_lang.php?v=1.4.2"></script>
<script type="text/javascript" src="../lib/pnp/todo/mytinytodo_ajax_storage.js?v=1.4.2"></script>

<script type="text/javascript">
$().ready(function(){


	mytinytodo.mttUrl = "../lib/pnp/todo/";
	mytinytodo.templateUrl = "../lib/pnp/todo/themes/default/";
	mytinytodo.db = new mytinytodoStorageAjax(mytinytodo);
	mytinytodo.init({
		needAuth: false,
		isLogged: false,
		showdate: false,
		singletab: false,
		duedatepickerformat: "n/j/y",

		firstdayofweek: 1,
		autotag: true
	}).loadLists(1);
});
</script>


';

header("Content-type: text/html; charset=utf-8");
?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
<?php
require(TEMPLATEPATH. 'index.php');
?>
    </div><!-- /container -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/common.js"></script>
 <?php echo $xfooter; ?>
  </body>
</html>
