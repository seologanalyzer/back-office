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

    $xpl = explode(':::', $data);
    //googlebot
    if (strpos($xpl[5], 'Googlebot') !== false):

      $x = explode(' ', $data[6]);
      $url = $data[5] . $x[1];

      mysql_query("INSERT INTO `sla_log_bot` VALUES (NULL, '" . $data[1] . "', '" . $data[2] . "',"
              . " '" . $data[0] . "', '" . $url . "', '1', '" . date('Y-m-d H:i:s') . "')");

    //googleuser
    elseif (strpos($xpl[4], 'google') !== false):

    //bing
    elseif (strpos($xpl[5], 'bingbot') !== false):

      $x = explode(' ', $data[6]);
      $url = $data[5] . $x[1];

      mysql_query("INSERT INTO `sla_log_bot` VALUES (NULL, '" . $data[1] . "', '" . $data[2] . "',"
              . " '" . $data[0] . "', '" . $url . "', '2', '" . date('Y-m-d H:i:s') . "')");

    //binguser
    elseif (strpos($xpl[4], 'bing.com') !== false):

    endif;

    mysql_query('INSERT INTO `sla_test` VALUES ("' . addslashes($data) . '")');
  }

  //process the data
} while (true);

mysql_close($mysql);
?>