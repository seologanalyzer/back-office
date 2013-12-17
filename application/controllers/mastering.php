<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Mastering extends CI_Controller {
  /*
    ======================================
    CONSTRUCTEUR
    ======================================
   */

  public function __construct() {
    parent::__construct();

    //	Paramétrages du Layout
    $this->layout->set_theme('admin_simple');
    $this->layout->set_titre('SLA | Web Mastering');
  }

  /*
    ======================================
    FONCTIONS
    ======================================
   */

  public function index() {
    $this->layout->view('view_example');
  }

  public function responsecode404() {
    $this->load->model('m_log_bot', 'log_bot');

    $errors = $this->log_bot->list_elements('1000', null, 'date DESC', $select = 'count(id_log_bot) as count, page, date', $where = array('code_response' => '404'), 'page');

    $date = array();
    foreach ($errors as $error):
      $xpl = explode(' ', $error->date);
      $date[$xpl[0]] = (!isset($date[$xpl[0]])) ? 0 : $date[$xpl[0]] + 1;
    endforeach;

    $fn = array();
    $today = new Datetime();
    for ($i = 0; $i < 30; $i++):
      $fn[$today->format('Y-m-d')] = (!isset($date[$today->format('Y-m-d')])) ? 0 : @$fn[$today->format('Y-m-d')] + $date[$today->format('Y-m-d')];
      $today->modify('-1 day');

    endfor;

    //30 days
    $prc = $this->log_bot->list_elements(null, null, null, $select = 'count( id_log_bot ) as count, code_response', null, 'code_response');

    $sum = 0;
    $sum_404 = 0;
    foreach ($prc as $code):
      $sum+=$code->count;
      if ($code->code_response == '404')
        $sum_404 = $code->count;
    endforeach;

    $days = round(($sum_404 / $sum) * 100, 2);
    $days_pages = $sum_404;
    //today
    $prc = $this->log_bot->list_elements(null, null, null, $select = 'count( id_log_bot ) as count, code_response', 'date BETWEEN "' . date('Y-m-d') . ' 00:00:00" AND "' . date('Y-m-d') . ' 23:59:59"', 'code_response');

    $sum = 0;
    $sum_404 = 0;
    foreach ($prc as $code):
      $sum+=$code->count;
      if ($code->code_response == '404')
        $sum_404 = $code->count;
    endforeach;

    $today = round(($sum_404 / $sum) * 100, 2);
    $today_pages = $sum_404;

    $datas = array('pages' => $errors, 'graph' => $fn,
      'percentage' =>
      array('30days' => $days,
        'today' => $today),
      'total' =>
      array('30days' => $days_pages,
        'today' => $today_pages),
    );



    $this->layout->view('mastering/responsecode404', $datas);
  }

  public function responsecode() {
    $this->load->model('m_code_response', 'code_response');

    $bots = array('1', '2');

    $date = new DateTime();
    $date->modify('-30 days');

    foreach ($bots as $id_bot):

      $sum = array();
      $codes = $this->code_response->list_elements(null, null, null, $select = 'SUM( value ) AS value, code', 'date >= "' . $date->format('Y-m-d') . ' " AND id_bot = "' . $id_bot . '" ', 'code');
      foreach ($codes as $k => $code):
        @$sum[$code->code] += $code->value;
        @$sum['all'] += $code->value;
      endforeach;

      $resume[$id_bot]['30days'] = $sum;

      $sum = array();
      $codes = $this->code_response->list_elements(null, null, null, $select = 'SUM( value ) AS value, code', 'date = "' . date('Y-m-d') . ' " AND id_bot = "' . $id_bot . '" ', 'code');
      foreach ($codes as $k => $code):
        @$sum[$code->code] += $code->value;
        @$sum['all'] += $code->value;
      endforeach;

      $resume[$id_bot]['today'] = $sum;

      //for graphs
      $logs = $this->code_response->list_elements(null, null, 'date DESC', $select = 'SUM( value ) AS value, code, date', 'id_bot = "' . $id_bot . '" ', 'date, code');

      $date2 = array();
      foreach ($logs as $log):
        $date2[$log->date][$log->code] = $log->value;
      endforeach;

      $fn = array();
      $today = new Datetime();
      for ($i = 0; $i < 30; $i++):
        $fn[$today->format('Y-m-d')]['200'] = @$date2[$today->format('Y-m-d')]['200'];
        $fn[$today->format('Y-m-d')]['301'] = @$date2[$today->format('Y-m-d')]['301'];
        $fn[$today->format('Y-m-d')]['302'] = @$date2[$today->format('Y-m-d')]['302'];
        $fn[$today->format('Y-m-d')]['404'] = @$date2[$today->format('Y-m-d')]['404'];
        $today->modify('-1 day');
      endfor;

      $graph[$id_bot] = $fn;

    endforeach;

    $datas = array('resume' => $resume, 'graph' => $graph);

    $this->layout->view('mastering/responsecode', $datas);
  }

  public function loadingtime() {
    $this->load->model('m_crawl_day', 'crawl_day');
    $this->load->model('m_crawl_hour', 'crawl_hour');

    $bots = array('1', '2');
    $loadtotal = array();

    foreach ($bots as $id_bot):
      $logs = $this->crawl_day->list_elements(null, null, 'date DESC', $select = 'loading_time, date', 'id_bot = "' . $id_bot . '" ', '');

      $date2 = array();
      foreach ($logs as $log):
        $date2[$log->date] = $log->loading_time;
      endforeach;

      $sum = 0;

      $fn = array();
      $today = new Datetime();
      for ($i = 0; $i < 30; $i++):
        $fn[$today->format('Y-m-d')] = (int) @$date2[$today->format('Y-m-d')];
        $today->modify('-1 day');
        $sum += (int) @$date2[$today->format('Y-m-d')];
      endfor;

      $loadtotal[$id_bot] = (int) ($sum / 30);
      $loadtime[$id_bot] = $fn;

      $loadhour[$id_bot] = $this->crawl_hour->list_elements(null, null, 'date DESC', $select = 'AVG(loading_time) as loading_time, hour', 'id_bot = "' . $id_bot . '" ', 'hour');

    endforeach;

    $datas = array('loadtime' => $loadtime, 'loadtotal' => $loadtotal, 'loadhour' => $loadhour);

    $this->layout->view('mastering/loadingtime', $datas);
  }

  public function keywords() {
    $this->load->model('m_log_user', 'log_user');
    
    $bots = array('1', '2');
    
    foreach ($bots as $id_bot):
      $logs = $this->log_user->list_elements(null, null, null, $select = 'count(id_log_user) as nb, page, keyword, date', 'id_bot = "' . $id_bot . '" ', 'keyword');
      $keywords[$id_bot] = $logs;
    endforeach;
    
    $datas = array('keywords' => $keywords);
     
    $this->layout->view('mastering/keywords', $datas);
  }

}

/* End of file mastering.php */
/* Location: ./application/controllers/mastering.php */