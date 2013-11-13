<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

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

}

/* End of file mastering.php */
/* Location: ./application/controllers/mastering.php */