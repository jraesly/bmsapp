<?php
$xheader = '<style>
	.error {
		color: red;
		display: none;
	}
	#ajaxsuccess {
		color: green;
		display: none;
		
		margin-left: auto;
		margin-right: auto;
		margin-top: 30px;
	}
</style>';
$xfooter = '<script type="application/javascript" src="../assets/js/fs.sysfrm.js"></script>';
 require ('sections/header.b4login.tpl.php'); ?> 
    
    <div class="span12">
    <div id="ajaxsuccess"><h4>We received Your Message and We will contact you soon !</h4></div>
    <div class="error alert"  id="err-form">
 
  <strong>Error!</strong> Please Correct The Error and Submit the Form Again
</div>
<div class="error alert" id="err-timedout">
 
  <strong>Error!</strong> The connection to the server timed out!
</div>
<div class="error alert" id="err-msg">
 
  <strong>Error!</strong> Please Enter your message!
</div>
<div class="error alert"  id="err-state">
 
  
</div>

	<form class="form-horizontal" id="ajax-form" method='post' action='cmd.contact-us.php'>
	  <fieldset>
	    <legend>Pre-Sales Contact Us </legend>
        <div class="control-group">
	      <label class="control-label" for="name">Name</label>
	      <div class="controls">
    <div class="input-prepend">
      <span class="add-on"><i class="icon-user"></i></span>
      <input name="name" id="name" type="text" class="input-xlarge">
      
    </div>
    <span class="error" id="err-name">Please Enter Your Name</span>
  </div>
	</div>
	    <div class="control-group">
	      <label class="control-label" for="email">Email</label>
	      <div class="controls">
    <div class="input-prepend">
      <span class="add-on"><i class="icon-envelope"></i></span>
      <input name="email" type="text" class="input-xlarge" id="email">
    </div>
    <span class="error" id="err-email">Please Enter your Email Address</span>
		<span class="error" id="err-emailvld">Please Enter a Valid Email Address</span>
  </div>
	</div>
	    
    <div class="control-group">
	      <label class="control-label" for="subject">Subject</label>
	      <div class="controls">
	        <input type="text" class="input-xxlarge" id="subject" name="subject">
	       <span class="error" id="err-subject">Please Enter a Subject</span> 
	      </div>
	</div>
	<div class="control-group">
	      <label class="control-label" for="message">Message</label>
	      <div class="controls">
	        <textarea rows="6"  id="message" name="message" class="input-block-level"></textarea>
	        
	      </div>
	</div>
	
	
	<div class="error" id="err-state"></div>
	<div class="control-group">
		<label class="control-label" for="submit"></label>
	      <div class="controls">
	       <button type="submit" id="send" name="submit" class="btn btn-inverse">Submit</button>
	       
	      </div>
	
	</div>
	
	
	   
	  </fieldset>
	</form>
	</div>

 <?php require ('sections/footer.tpl.php'); ?>

