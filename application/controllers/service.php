<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Service extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('m_log_bot', 'log_bot');
  }

  public function realtimegoogle() {
    
    $time = new DateTime();
    $start_time = $time->format('Y-m-d H:i:s');
    $time->modify('-2 seconds');
    $end_time = $time->format('Y-m-d H:i:s');
    
//    echo $this->log_bot->count(array('date >=' => $start_time,
//      'date <=' => $end_time,
//      'id_bot' => 1));
    
    echo '{"cpu":47, "core":11, "disk":550}';
  }

}

/* End of file service.php */
/* Location: ./application/controllers/service.php */