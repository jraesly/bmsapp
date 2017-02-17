<?php
$xheader='

<link rel="stylesheet" type="text/css" href="../assets/css/mail-style.css">

';

$xfooter ='
<script>
$("tr").click(function() {
  window.location.href = $(this).find("a").attr("href");
});
$(\'#select-all\').click(function(event) {   
    if(this.checked) {
       $("input[type=\'checkbox\']").prop("checked", true);
	   $(\'#act\').css(\'visibility\',\'visible\');
    }
	else {
		$("input[type=\'checkbox\']").prop("checked", false);
		$(\'#act\').css(\'visibility\',\'hidden\');
	}
});
$(\'#act\').css(\'visibility\',\'hidden\');
</script>

';

?>
<?php require ('sections/header.tpl.php'); 

?>
    <div class="container">
    <div class="row-fluid">
    <?php notify(); ?>
    </div>
<form action="cmd.tickets.php" method="post">

<div class="box">
							<div class="box-head">
								
								<span><?php echo $_L['supportTickets'];?>   </span><span id="act"> <button name="submit"  class="btn btn-primary btn-mini" type="submit" value="markunread">Mark as Unread</button> <button name="submit"  class="btn btn-warning btn-mini" type="submit" value="markread">Mark as Read</button> <button name="submit"  class="btn btn-danger btn-mini" type="submit" value="delete">Delete</button></span>
							</div>
							<div class="box-body box-body-nopadding">
							  
                                  <table class="table table-striped mbzero tbl-mail">
									<thead>
										<tr>
											<th class='tbl-checkbox'>
												<input type="checkbox" id="select-all"><a href='#'></a>
											</th>
											
											<th><?php echo $_L['customer'];?>   </th>
											<th><?php echo $_L['subject'];?>   </th>
											
											<th class='tbl-date'><?php echo $_L['date'];?>   </th>
										</tr>
									</thead>
									<tbody>
                                    <?php
								
									
									
									$i='0';
$ext = EXT;
foreach ($items as $item) {
	$i++;
	$id = $item['id'];
	$name = $item['name'];
	$date = $item['date'];

    $idate=strtotime($date);
    $date=date($sys_date,$idate);

	$subject = $item['subject'];
	$aread = $item['aread'];
	$trclass = '';
	if ($aread!='Yes'){
		$trclass =  'class="act"';
	}
	echo "
	<tr $trclass>
											<td class='tbl-checkbox'>
												<input type=\"checkbox\" name=\"tid[]\" value=\"$id\"><a href='view-ticket$ext?_xClick=$id'></a>
											</td>
											
											<td class='tbl-lft'>
												$name
											</td>
											<td>
												
												$subject
											</td>
											
											<td class='tbl-date'>
												$date
											</td>
										</tr>
	";
}
									
									?>
										

									</tbody>
								</table>
                                
                               
                                 
                                        
	</div>
	  </div>

</form>
 <?php  
 echo  $paginate['contents']; 
?> 
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>
