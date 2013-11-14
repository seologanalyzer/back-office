<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Parameters extends CI_Controller {

  public function __construct() {
    parent::__construct();

    $this->layout->set_theme('admin_simple');
    $this->layout->set_titre('SLA | Paramètrages');
    $this->load->model('m_configuration', 'configuration');
  }

  public function index() {

    //	Dependendy Injection
    $datas = array(
      'configuration' => $this->configuration->getConfiguration('PERIOD')
    );

    $this->layout->view('parameters/index', $datas);
  }

  public function recperiod() {
    echo $this->configuration->setConfiguration($this->input->post());
  }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */