<?php
if (isset($db_host)){
}
else {
require_once ('../../../AppConfig.php');	
}
$config = array();
$config['db'] = 'mysql';
$config['mysql.host'] = $db_host;
$config['mysql.db'] = $db_name;
$config['mysql.user'] = $db_user;
$config['mysql.password'] = $db_password;
$config['prefix'] = 'mtt_';
$config['url'] = '';
$config['mtt_url'] = '';
$config['title'] = '';
$config['lang'] = 'en';
$config['password'] = '';
$config['smartsyntax'] = 1;
$config['timezone'] = 'UTC';
$config['autotag'] = 1;
$config['duedateformat'] = 1;
$config['firstdayofweek'] = 1;
$config['session'] = 'files';
$config['clock'] = 24;
$config['dateformat'] = 'j M Y';
$config['dateformat2'] = 'n/j/y';
$config['dateformatshort'] = 'j M';
$config['template'] = 'default';
$config['showdate'] = 0;