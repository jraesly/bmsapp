<?php
session_start();
define("_APP_RUN", true);
require "../AppINIT.php";
session_destroy();
session_start();
r2('login'.EXT,'e','Logged Out Successful, You can Login Again');