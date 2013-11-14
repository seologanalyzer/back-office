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
  $query = mysql_query("SELECT date, loading_time FROM `" . SLA_DB_PREFIX . "log_bot`"
          . "WHERE id_bot = '" . $bot . "' AND date BETWEEN '" . date('Y-m-d') . " 00:00:00' "
          . "AND '" . date('Y-m-d') . " 23:59:59' ");
  $array = array();
  $time = array();
  $load_hour = array();
  $load = 0;
  while ($z = mysql_fetch_row($query)) {
    $array[] = $z[0];
    $load += $z[1];
    $date = strtotime($z[0]);
    $time[date('H', $date)] = (!isset($time[date('H', $date)])) ? '1' : $time[date('H', $date)] + 1;
    $load_hour[date('H', $date)] = (!isset($load_hour[date('H', $date)])) ? $z[1] : $load_hour[date('H', $date)]+$z[1];
  }
  $v = sizeof($array);
  $load = ($load) / $v;
  mysql_query("REPLACE INTO `" . SLA_DB_PREFIX . "crawl_day`"
          . " (value, id_bot, date, loading_time) VALUES "
          . "('" . $v . "', '" . $bot . "', '" . date('Y-m-d') . "', '" . $load . "') ");

  //recording hours
  foreach ($time as $hour => $value):
    $t = $load_hour[$hour]/$value;
    mysql_query("REPLACE INTO `" . SLA_DB_PREFIX . "crawl_hour`"
            . " (value, id_bot, date, hour, loading_time) VALUES "
            . "('" . $value . "', '" . $bot . "', '" . date('Y-m-d') . "', '" . $hour . "', '".$t."') ");
  endforeach;

endforeach;

//update configuration
mysql_query("UPDATE `" . SLA_DB_PREFIX . "configuration` SET `value` = '" . date('Y-m-d H:i:s') . "' "
        . "WHERE name = 'LAST_ANALYSIS' ");

//close mysql
mysql_close($mysql);

echo date('Y-m-d à H:i:s');
