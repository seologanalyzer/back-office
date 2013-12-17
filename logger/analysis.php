<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
define('BASEPATH', '1');

require_once dirname(__FILE__) . '/../application/config/constants.php';
$mysql = mysql_connect(SLA_DB_HOSTNAME, SLA_DB_USERNAME, SLA_DB_PASSWORD);
mysql_select_db(SLA_DB_DATABASE);

$query = mysql_query("SELECT value FROM `" . SLA_DB_PREFIX . "configuration`"
        . "WHERE name = 'LAST_ANALYSIS' ");

$xpl = explode(' ', mysql_result($query, 0));
$date = new DateTime($xpl[0]);

while ($date->format('Y-m-d') <= date('Y-m-d')):

  $bots = array('1', '2');

  foreach ($bots as $bot):
    //visits/day
    //gg
    $query = mysql_query("SELECT date, loading_time FROM `" . SLA_DB_PREFIX . "log_bot`"
            . "WHERE id_bot = '" . $bot . "' AND date BETWEEN '" . $date->format('Y-m-d') . " 00:00:00' "
            . "AND '" . $date->format('Y-m-d') . " 23:59:59' ");
    $array = array();
    $time = array();
    $load_hour = array();
    $load = 0;
    while ($z = mysql_fetch_row($query)) {
      $array[] = $z[0];
      $load += $z[1];
      $date_row = strtotime($z[0]);
      $time[date('H', $date_row)] = (!isset($time[date('H', $date_row)])) ? '1' : $time[date('H', $date_row)] + 1;
      $load_hour[date('H', $date_row)] = (!isset($load_hour[date('H', $date_row)])) ? $z[1] : $load_hour[date('H', $date_row)] + $z[1];
    }
    $v = sizeof($array);
    $load = ($load) / $v;
    mysql_query("REPLACE INTO `" . SLA_DB_PREFIX . "crawl_day`"
            . " (value, id_bot, date, loading_time) VALUES "
            . "('" . $v . "', '" . $bot . "', '" . $date->format('Y-m-d') . "', '" . $load . "') ");

    //recording hours
    foreach ($time as $hour => $value):
      $t = $load_hour[$hour] / $value;
      mysql_query("REPLACE INTO `" . SLA_DB_PREFIX . "crawl_hour`"
              . " (value, id_bot, date, hour, loading_time) VALUES "
              . "('" . $value . "', '" . $bot . "', '" . $date->format('Y-m-d') . "', '" . $hour . "', '" . $t . "') ");
    endforeach;

  endforeach;
  
  $date->modify('+1 day');
  
endwhile;

//update configuration
mysql_query("UPDATE `" . SLA_DB_PREFIX . "configuration` SET `value` = '" . date('Y-m-d H:i:s') . "' "
        . "WHERE name = 'LAST_ANALYSIS' ");

//close mysql
mysql_close($mysql);

echo date('Y-m-d à H:i:s');
