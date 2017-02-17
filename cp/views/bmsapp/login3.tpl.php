<?php require ('sections/header.b4login.tpl.php'); ?>  
 
    <div class="span12">
    <?php notify(); ?> 
      <!--Body content-->
      <form class="form-horizontal" action='cmd.login.php' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Login</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Username</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
      </div>
    </div>
 
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
       <p>
       <input name="after" type="hidden" value="<?php echo $after; ?>">
       <button type="submit" class="btn btn-primary" name="login">Sign in</button><br>
<br>

       <a href="register.php">Create New Account</a>  | 
        <a href="forgot-pw.php">Forgot Password?</a>
      </p>
      </div>
    </div>
  </fieldset>
</form>
     
    </div>

 <?php require ('sections/footer.tpl.php'); ?>

