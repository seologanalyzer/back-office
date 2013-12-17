<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Analysis extends CI_Controller {
  /*
    ======================================
    CONSTRUCTEUR
    ======================================
   */

  public function __construct() {
    parent::__construct();

    //	Paramétrages du Layout
    $this->layout->set_theme('admin_simple');
    $this->layout->set_titre('SLA | Web Analysis');
  }

  /*
    ======================================
    FONCTIONS
    ======================================
   */

  public function index() {
    $this->layout->view('view_example');
  }

  public function add() {

    $this->layout->view('analysis/add');
  }

}

/* End of file analysis.php */
/* Location: ./application/controllers/analysis.php */
