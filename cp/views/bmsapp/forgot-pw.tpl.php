<?php require ('sections/header.b4login.tpl.php'); ?>  
 
    <div class="span12">
    <?php notify(); ?> 
      <!--Body content-->
      <form class="form-horizontal" action='cmd.forgot.pw.php' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Reset Password</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Email Address</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
        
      </div>
    </div>
 
    
 
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
       <p>
       <input name="act" type="hidden" value="reset">
       <button type="submit" class="btn btn-primary" name="submit">Reset</button><br>
<br>

       <a href="register.php">Already have an account ? Click Here To Login</a> 
      </p>
      </div>
    </div>
  </fieldset>
</form>
     
    </div>

 <?php require ('sections/footer.tpl.php'); ?>

