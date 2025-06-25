<?php
require 'environment.php';

define("BASE", "https://www.ligataubate.com.br/cms/");

global $config;
$config = array();
if(ENVIRONMENT == 'development') {
  $config['dbname'] = 'admin_liga';
  $config['host'] = 'admin_liga.mysql.dbaas.com.br';
  $config['dbuser'] = 'admin_liga';
  $config['dbpass'] = 'Liga@@123##';
} else {
  $config['dbname'] = 'cms';
  $config['host'] = 'localhost';
  $config['dbuser'] = 'root';
  $config['dbpass'] = '';
}
?>