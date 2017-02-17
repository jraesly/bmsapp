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
        <h4>Database</h4>
        
         <p>Here is a code example To find a single record by ID, you can pass the ID directly to the findOne method:</p>
          <p></p>
        </div>
       <pre style="width:100%"><code class="language-css">$cl=findOne('accounts','1');
       /*
       Without writing a single character of SQL, you can retrive the database record using this method.
       Now just use $cl['columnname'] to display the data
       For example echo $cl['name']; 
       The first param tells the function which table to use when making the query and the second param tells the ID
       */
       
       </code></pre>

        </div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>