<?php
require 'boot.php';
Acl::isAllowed('todo.php');
$self='home'. EXT;
require ('../lib/pnp/todo/init.php');
$lang = Lang::instance();

if($lang->rtl()) Config::set('rtl', 1);

if(!is_int(Config::get('firstdayofweek')) || Config::get('firstdayofweek')<0 || Config::get('firstdayofweek')>6) Config::set('firstdayofweek', 1);

define('TEMPLATEPATH', MTTPATH. 'themes/'.Config::get('template').'/');
require ("views/$gat/todo.tpl.php");