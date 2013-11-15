<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Dashboard extends CI_Controller {
  /*
    ======================================
    CONSTRUCTEUR
    ======================================
   */

  public function __construct() {
    parent::__construct();

    $this->layout->set_theme('admin_simple');
    $this->layout->set_titre('SLA | Tableau de bord');

    $this->load->model('m_configuration', 'configuration');
    $this->load->model('m_crawl_day', 'crawl_day');
  }

  /*
    ======================================
    FONCTIONS
    ======================================
   */

  public function index() {
    
    $crawlday = $this->crawl_day->get(array('value', 'loading_time', 'id_bot'), array('date' => date('Y-m-d')));
    foreach($crawlday as $bot)
      $crawl_day[$bot->id_bot] = $bot;
    
    $datas = array(
      'configuration' => $this->configuration->getProperty('LAST_ANALYSIS'),
      'crawl_day' => $crawl_day
    );
    
    $this->layout->view('dashboard/index', $datas);
  }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */