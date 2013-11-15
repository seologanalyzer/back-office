<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Service extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('m_log_bot', 'log_bot');
  }

  public function realtime() {
    
    $time = new DateTime();
    $start_time = $time->format('Y-m-d H:i:s');
    $time->modify('-5 seconds');
    $end_time = $time->format('Y-m-d H:i:s');
    
    $google = $this->log_bot->count(array('date <=' => $start_time,
      'date >=' => $end_time,
      'id_bot' => '1'));
    
    $bing = $this->log_bot->count(array('date <=' => $start_time,
      'date >=' => $end_time,
      'id_bot' => '2'));
    
    echo '{"gg":'.(int)$google.', "bg":'.(int)$bing.'}';
  }


}

/* End of file service.php */
/* Location: ./application/controllers/service.php */