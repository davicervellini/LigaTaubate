<?php
class model {
  
  protected $db;

  public function __construct() {
    global $config;
    if(empty($config))
    {
      $config["dbname"] = 'admin_liga';
      $config["host"] = 'admin_liga.mysql.dbaas.com.br';
      $config["dbuser"] = 'admin_liga';
      $config["dbpass"] = 'Liga@@123##';

    }
    
    $this->db = new PDO("mysql:dbname=".$config['dbname'].";charset=utf8;host=".$config['host'], $config['dbuser'], $config['dbpass']);
  }

}
?>