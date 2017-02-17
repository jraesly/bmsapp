<?php
$xheader='<link rel="stylesheet" type="text/css" href="../assets/css/left-nav.style.css">
<link rel="stylesheet" type="text/css" href="../assets/lib/prism/prism.css">

';
$xfooter = '<script src="../assets/js/filter.sysfrm.js" type="text/javascript"></script>
<script src="../assets/js/filter.sysfrm.js" type="text/javascript"></script>
<script src="../assets/lib/prism/prism.js" type="text/javascript"></script>
';

?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">

        <div id="left-nav" class="hidden-phone">
			<?php require ('sections/dev-tools.section.tpl.php'); ?>
		</div>
 
        <div class="right-container">
        <div class="span8">
        <h4> <?php echo $_L['dabout'];?></h4>
                 <ul class="the-icons clearfix">
           
            <li><i class="icon-ok"></i><?php echo $_L['d1'];?>.</li>
             <li><i class="icon-ok"></i> <?php echo $_L['d2'];?></li>
             <li><i class="icon-ok"></i> <?php echo $_L['d3'];?></li>
             <li><i class="icon-ok"></i> <?php echo $_L['d4'];?></li>
              <li><i class="icon-ok"></i> <?php echo $_L['d5'];?></li>

          </ul>
       
        </div>
      
        </div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>