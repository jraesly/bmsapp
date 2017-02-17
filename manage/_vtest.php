<?php
$passed = '';
$ltext = '';
if (version_compare(PHP_VERSION, '5.2.0') >= 0) {
    $ltext .= 'To Run BmsAPP You need at least PHP version 5.2.0, Your PHP Version is: ' . PHP_VERSION . " Tested ---PASSED---<br/>";
    $passed .= '1';
    
}
else {
    $ltext .= 'To Run BmsAPP You need at least PHP version 5.2.0, Your PHP Version is: ' . PHP_VERSION . " Tested ---FAILED---<br/>";
    $passed .='0';
    
}

if (extension_loaded ('PDO' )){
    $ltext .= 'PDO is installed on your server: '."Tested ---PASSED---<br/>";
    $passed .= '1';
}
else {
    $ltext= 'PDO is installed on your server: '."Tested ---FAILED---<br/>";
    $passed .='0';
    
}

if (extension_loaded ('pdo_mysql' )){
    $ltext .= 'PDO MySQL driver is enabled on your server: '."Tested ---PASSED---<br/>";
    $passed .= '1';
}
else {
    $ltext .= 'PDO MySQL driver is not enabled on your server: '."Tested ---FAILED---<br/>";
    $passed .='0';
    
}
if ($passed=='111'){
 exit ("$passed <br/> $ltext <br/> Great. You can run BmsAPP on your server");   
}
else {
 exit ("$passed <br/> $ltext <br/> Sorry. The requirements of BmsAPP is not available on your server. 
 Please contact with BmsAPP with this code- $passed Or contact with your server administrator");    
}

