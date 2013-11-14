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

    //	Paramétrages du Layout
    $this->layout->set_theme('admin_simple');
    $this->layout->set_titre('SLA | Tableau de bord');
  }

  /*
    ======================================
    FONCTIONS
    ======================================
   */

  public function index() {
    $this->layout->view('dashboard/index');
  }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */