<?php
session_start();
define("_APP_RUN", true);
require "../AppINIT.php";
session_destroy();
session_start();
//r2('login.php'.EXT,'s','Logged Out Successful, You can Login Again');
r2('login.php','s','Logged Out Successful, You can Login Again');