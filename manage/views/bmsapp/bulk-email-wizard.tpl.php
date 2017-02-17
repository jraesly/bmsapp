<?php
$xheader='
<link rel="stylesheet" href="../lib/pnp/redactor/redactor/redactor.css" />
 <link href="../assets/lib/multiselect/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
';
$xfooter = '<script src="../assets/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
<script src="../assets/lib/multiselect/js/jquery.multi-select.js" type="text/javascript"></script>
	<script>
	$(document).ready(function() {
    $(\'#rootwizard\').bootstrapWizard({
        tabClass: \'nav nav-tabs\',
       onTabShow: function(tab, navigation, index) {
			var $total = navigation.find(\'li\').length;
			var $current = index+1;
			var $percent = ($current/$total) * 100;
			$(\'#rootwizard\').find(\'.bar\').css({width:$percent+\'%\'});
		},
		onNext: function(tab, navigation, index) {
           // alert(\'next\');
        }
  });
  $(\'#clgroups\').multiSelect();
  $(\'#select-all\').click(function(){
  $(\'#clgroups\').multiSelect(\'select_all\');
  return false;
});
$(\'#deselect-all\').click(function(){
  $(\'#clgroups\').multiSelect(\'deselect_all\');
  return false;
});
});
	</script>
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

	
';


?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
<form action="bulk-email-send.php" method="post" name="bulk-email">
<div class="span12">
			
	<?php notify(); ?>		  
	            <h4><?php echo $_L['sendBulkEmail'];?></h4>
	          
	
				<div id="rootwizard" class="tabbable tabs-left">
                <div id="bar" class="progress progress-striped active">
					  <div class="bar"></div>
					</div>
					<ul>
					  	<li><a href="#tab1" data-toggle="tab"><?php echo $_L['chooseContact']; ?></a></li>
						<li><a href="#tab2" data-toggle="tab"><?php echo $_L['composeEmail']; ?></a></li>
						<li><a href="#tab3" data-toggle="tab"><?php echo $_L['confirmAndSend']; ?></a></li>
						
						
					</ul>
                    
					<div class="tab-content">
					    <div class="tab-pane" id="tab1">
                        
					      


<select id='clgroups' multiple='multiple' name="clgroups[]">
   <?php
						  $stmt = $dbh->prepare("select * from accgroups");
$stmt->execute();
$result = $stmt->fetchAll();
$i="0";
$ext = EXT;
if ($stmt->rowCount() > 0) {
    foreach($result as $value) {
				
				
        $id = $value['id'];
		$name = $value['groupname'];
		
		
		
		
		echo " <option value=\"$id\">$name</option>";
	}
}
						  ?>
</select>
<hr>
<p><a href='#' id='select-all' class="btn btn-primary"><?php echo $_L['selectAll']; ?></a>
<a href='#' id='deselect-all' class="btn btn-danger"><?php echo $_L['deSelectAll']; ?></a>
<span><?php echo $_L['stcg']; ?>   &rarr;</span>

</p>


					    </div>
					    <div class="tab-pane" id="tab2">
                        <input type="text" name="subject" placeholder="email subject..." size="100" class="input-block-level" />
					     <textarea name="message" rows="12" class="input-block-level"  id="redactor_content"></textarea>
					    </div>
						<div class="tab-pane" id="tab3">
							<button class="btn btn-large btn-primary input-block-level" type="submit">Click Here To Continue</button>
					    </div>
						
						
						
						<ul class="pager wizard">
							<li class="previous first" style="display:none;"><a href="#">First</a></li>
							<li class="previous"><a href="#">&larr; Previous</a></li>
							<li class="next last" style="display:none;"><a href="#">Last</a></li>
						  	<li class="next"><a href="#">Next  &rarr;</a></li>
						</ul>
					</div>	
				</div>			
			
 		</div>
</form>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>