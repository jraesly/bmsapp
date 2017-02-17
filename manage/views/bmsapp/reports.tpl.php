<?php
$xheader='<link rel="stylesheet" type="text/css" href="../assets/css/reports.style.css">

';
$xfooter = '<script src="../assets/js/filter.sysfrm.js" type="text/javascript"></script>
';

?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">

        <div id="left-nav" class="hidden-phone">
			<div id="left-nav-inside">
				<div id="search">
					<input type="text" id="filter" placeholder="Quick search ..." />
					<button class="glyphicons search"><i></i></button>
				</div>
				<ul id="filtertxt">
					<li class="heading"><span>Category</span></li>
					<li class="glyphicons home"><a href="index.html?lang=en"><i></i><span><i class="icon-search"></i> Dashboard</span></a></li>
					<li class="glyphicons cogwheels"><a href="ui.html?lang=en"><i></i><span><i class="icon-search"></i> UI Elements</span></a></li>
					<li class="glyphicons charts"><a href="charts.html?lang=en"><i></i><span><i class="icon-search"></i> Charts</span></a></li>
					<li>
						<a data-toggle="collapse" class="glyphicons show_thumbnails_with_lines" href="#menu_forms"><i></i><span><i class="icon-search"></i> Forms</span></a>
						<ul class="collapse" id="menu_forms">
							<li class=""><a href="form_demo.html?lang=en"><span><i class="icon-search"></i> My Account</span></a></li>
							<li class=""><a href="form_elements.html?lang=en"><span><i class="icon-search"></i> Form Elements</span></a></li>
							<li class=""><a href="form_validator.html?lang=en"><span><i class="icon-search"></i> Form Validator</span></a></li>
							<li class=""><a href="file_managers.html?lang=en"><span><i class="icon-search"></i> File Managers</span></a></li>
						</ul>
					</li>
					<li class="">
						<a class="glyphicons table" href="tables.html?lang=en"><i></i><span><i class="icon-search"></i> Tables</span></a>
					</li>
					<li class="glyphicons calendar"><a href="calendar.html?lang=en"><i></i><span><i class="icon-search"></i> Calendar</span></a></li>
					<li class="glyphicons user"><a href="login.html?lang=en"><i></i><span><i class="icon-search"></i> Login</span></a></li>
				</ul>
				
			</div>
		</div>
 
        <div class="right-container">
        <p>helo there</p>
        </div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>