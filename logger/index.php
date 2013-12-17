#!/usr/bin/php
<?php
ini_set('display_errors', 1);
ini_set('max_execution_time', 0);
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

      $x = explode(' ', $xpl[7]);
      $url = utf8_decode(urldecode($xpl[6] . $x[1]));

      mysql_query("INSERT INTO `".SLA_DB_PREFIX."log_bot` VALUES (NULL, '" . $xpl[1] . "',  '" . $xpl[3] . "', '" . $xpl[2] . "',"
              . " '" . $xpl[0] . "', '" . $url . "', '1', '" . date('Y-m-d H:i:s') . "')");

    //googleuser
    elseif (strpos($xpl[4], 'google') !== false):

      $x = explode(' ', $xpl[7]);
      $url = utf8_decode(urldecode($xpl[6] . $x[1]));

      //referer
      $parts = parse_url($xpl[4]);
      if (isset($parts['query'])) {
        parse_str($parts['query'], $query);
      }
      if (!isset($query['q']) || $query['q'] == ''):
        $query['q'] = 'not provided';
      endif;

      mysql_query("INSERT INTO `".SLA_DB_PREFIX."log_user` VALUES (NULL, '" . $xpl[0] . "',  '" . $url . "', '1',"
              . " '" . $query['q'] . "', '" . date('Y-m-d H:i:s') . "')");

    //bing
    elseif (strpos($xpl[5], 'bingbot') !== false):

      $x = explode(' ', $xpl[7]);
      $url = utf8_decode(urldecode($xpl[6] . $x[1]));

      mysql_query("INSERT INTO `".SLA_DB_PREFIX."log_bot` VALUES (NULL, '" . $xpl[1] . "',  '" . $xpl[3] . "', '" . $xpl[2] . "',"
              . " '" . $xpl[0] . "', '" . $url . "', '2', '" . date('Y-m-d H:i:s') . "')");

    //binguser
    elseif (strpos($xpl[4], 'bing.com') !== false):

      $x = explode(' ', $xpl[7]);
      $url = utf8_decode(urldecode($xpl[6] . $x[1]));

      //referer
      $parts = parse_url($xpl[4]);
      if (isset($parts['query'])) {
        parse_str($parts['query'], $query);
      }
      if (!isset($query['q']) || $query['q'] == ''):
        $query['q'] = 'not provided';
      endif;

      mysql_query("INSERT INTO `".SLA_DB_PREFIX."log_user` VALUES (NULL, '" . $xpl[0] . "',  '" . $url . "', '2',"
              . " '" . $query['q'] . "', '" . date('Y-m-d H:i:s') . "')");

    endif;
		
    mysql_query('INSERT INTO `'.SLA_DB_PREFIX.'test` VALUES ("' . addslashes($data) . '")');
  }

  //process the data
} while (true);

mysql_close($mysql);
?>
