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
        <h4>Data Encryption and Decryption</h4>
        <p>You can use blowfish.php available in the library folder to encrypt and decrypt data using the Blowfish algorithm</p>
        <p></p>
         <p>Here is the sample code for encryption and decryption -</p>
          <p></p>
        </div>
       <pre style="width:100%"><code class="language-css">require ('lib/blowfish.php');
  $encrypted =     b_encrypt ('I want to encrypt this data', 'with_this_secret_string');
  echo $encrypted;
  /*
  This will output similar like this -
  lzDp11fhhmf/QMq34XXWl2d9PeaQJTG+ed/rSAMOH5A=
  later you can decrypt this using this function-
  b_decrypt($encrypted, 'with_this_secret_string')
  */
       
       </code></pre>

      
        </div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>