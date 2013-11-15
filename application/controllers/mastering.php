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

    $datas = array('pages' => $errors);



    $this->layout->view('mastering/responsecode404', $datas);
  }

}

/* End of file mastering.php */
/* Location: ./application/controllers/mastering.php */