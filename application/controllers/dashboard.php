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
  }

  /*
    ======================================
    FONCTIONS
    ======================================
   */

  public function index() {
    $datas = array(
      'configuration' => $this->configuration->getProperty('LAST_ANALYSIS')
    );
    $this->layout->view('dashboard/index', $datas);
  }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */