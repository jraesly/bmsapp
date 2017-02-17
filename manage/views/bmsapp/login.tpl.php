<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Business Management Application</title>
     <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <link href="views/bmsapp/css/logincss.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div class="container">

    <div class="wrapper">

        <div>
<div class="logo"><img src="../assets/uploads/logo.png" width="150" height="44" alt="logo" /></div>





          <div>

                <form class="login" method="post" action="<?php echo $self; ?>">
                    <fieldset>
                    
                        <div class="row">
                            <input type="text" class="login" id="username" name="username" placeholder="Username / Email Address" />
                       
                        </div>
                        <div class="row">
                            <input type="password" class="password" id="password" name="password" placeholder="Password"/>
                            
                        </div>
                        <div class="row">
                         <button class="btn btn-primary" name="login" type="submit">Admin Login</button>
  
                        </div>

                    </fieldset>
                </form>
            <div style="clear: both; color:#F00"><?php 
            
            if(isset($_SESSION['notify'])) {
        $notify = $_SESSION['notify'];
       
        
            echo "<span class=\"label label-important\">$notify</span>";
        
             unset($_SESSION['notify']);
        unset($_SESSION['ntype']);
            }
            ?></div>

            </div>

        </div>

    </div>
</div>
</body>
</html>
