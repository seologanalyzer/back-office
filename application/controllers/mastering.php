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
    $this->load->model('m_log_bot', 'log_bot');
   
    $datas = array('pages' => 'test');
    
    $this->layout->view('mastering/responsecode', $datas);
    
  }

}

/* End of file mastering.php */
/* Location: ./application/controllers/mastering.php */