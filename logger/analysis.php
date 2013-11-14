<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
define('BASEPATH', '1');

require_once dirname(__FILE__) . '/../application/config/constants.php';
$mysql = mysql_connect(SLA_DB_HOSTNAME, SLA_DB_USERNAME, SLA_DB_PASSWORD);
mysql_select_db(SLA_DB_DATABASE);

$bots = array('1', '2');

foreach ($bots as $bot):
  //visits/day
  //gg
  $query = mysql_query("SELECT date FROM `" . SLA_DB_PREFIX . "log_bot`"
          . "WHERE id_bot = '".$bot."' AND date BETWEEN '" . date('Y-m-d') . " 00:00:00' "
          . "AND '" . date('Y-m-d') . " 23:59:59' ");
  $array = array();
  $time = array();

  while ($z = mysql_fetch_row($query)) {
    $array[] = $z[0];
    $date = strtotime($z[0]);
    $time[date('H', $date)] = (!isset($time[date('H', $date)])) ? '1' : $time[date('H', $date)] + 1;
  }
  $v = sizeof($array);
  mysql_query("REPLACE INTO `" . SLA_DB_PREFIX . "crawl_day`"
          . " (value, id_bot, date) VALUES "
          . "('" . $v . "', '".$bot."', '" . date('Y-m-d') . "') ");

  //recording hours
  foreach ($time as $hour => $value):
    mysql_query("REPLACE INTO `" . SLA_DB_PREFIX . "crawl_hour`"
            . " (value, id_bot, date, hour) VALUES "
            . "('" . $value . "', '".$bot."', '" . date('Y-m-d') . "', '" . $hour . "') ");
  endforeach;

endforeach;

//update configuration
mysql_query("UPDATE `" . SLA_DB_PREFIX . "configuration` SET `value` = '" . date('Y-m-d H:i:s') . "' "
        . "WHERE name = 'LAST_ANALYSIS' ");

//close mysql
mysql_close($mysql);

echo date('Y-m-d à H:i:s');
