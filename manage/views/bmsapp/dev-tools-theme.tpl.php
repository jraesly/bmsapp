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
        <h4>Creating Theme</h4>
        <p>You can create your own theme with plain php code. You do not have to use any template engine. Create pages and put it on a folder. Put the folder in views folder under cp/views (For Client Theme) or manage/views (For Admin Theme) And Activate it from admin panel (Setup->System Settings->Theme). Also put a screenshot of your theme to your theme root folder with the name - _theme-preview.jpg The system will automatically show the theme name in Admin panel with the screenshot of the theme.</p>
        <p></p>
         <p>Here is the code snippet that used to show the theme name from available theme in the theme folder.</p>
          <p></p>
        </div>
       <pre style="width:100%"><code class="language-css">if ($handle = opendir('../cp/views')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
			 if($gTheme==$entry){$selected = "selected=\"selected\""; }
			 else {
				 $selected="";
			 }
            echo "<option value=\"$entry\" 
             
            $selected
            >$entry</option>";
           
        }
    }
    closedir($handle);
}</code></pre>

        </div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>