#!/usr/bin/php
<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
define('BASEPATH', '1');

require_once dirname(__FILE__) . '/../application/config/constants.php';
$mysql = mysql_connect(SLA_DB_HOSTNAME, SLA_DB_USERNAME, SLA_DB_PASSWORD);
mysql_select_db(SLA_DB_DATABASE);

$fp = fopen("php://stdin", 'r');
do {
  //read a line from apache, if not, will block until have it  
  $data = fgets($fp);
  $data = trim($data); //remove line end  
  
  if (($data) !== '') {
    mysql_query('INSERT INTO `sla_test` VALUES ("' . addslashes($data) . '")');
  }

  //process the data  
} while (true);

mysql_close($mysql);
?>