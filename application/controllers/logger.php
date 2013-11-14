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
  }

  /*
    ======================================
    FONCTIONS
    ======================================
   */

  public function index() {

    //logger
    $stdin = fopen("php://stdin", "r");
    //ob_implicit_flush(true);
    while ($line = fgets($stdin)) {
      $query = "INSERT INTO `sla_test` VALUES ('" . addslashes($line) . "')";
      $this->db->query($query);
    }
    exit;
  }

}

/* End of file loger.php */
/* Location: ./application/controllers/loger.php */