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
    $this->load->model('m_log_bot', 'log_bot');
  }

  /*
    ======================================
    FONCTIONS
    ======================================
   */

  public function index() {

    $time = new DateTime();
    $time->modify('-30 days');

    //get crawl today
    $crawlday = $this->crawl_day->get(array('value', 'loading_time', 'id_bot'), array('date' => date('Y-m-d')));
    foreach ($crawlday as $bot)
      $crawl_today[$bot->id_bot] = $bot;

    //get crawl last 30d
    $crawldays = $this->crawl_day->list_elements(null, null, null, $select = 'value, loading_time, id_bot', 'date >= ' . $time->format('Y-m-d'), null);
    $i = 0;
    foreach ($crawldays as $k => $bot):
      //avoid notice
      @$crawl_days[$bot->id_bot]['loading_time'] += $bot->loading_time;
      @$crawl_days[$bot->id_bot]['value'] += $bot->value;
      $i++;
    endforeach;
    
    $crawl_days['1']['loading_time'] = (int)($crawl_days['1']['loading_time']/$i);
    $crawl_days['2']['loading_time'] = (int)($crawl_days['2']['loading_time']/$i);

    //get 404 last day
    $fourofour_today = $this->log_bot->list_elements(null, null, null, $select = 'count( id_log_bot ) as count', 'date BETWEEN "' . date('Y-m-d') . ' 00:00:00" AND "' . date('Y-m-d') . ' 23:59:59" AND code_response = "404"', 'code_response');
    //get 404 last 30d
    $fourofour_days = $this->log_bot->list_elements(null, null, null, $select = 'count( id_log_bot ) as count', 'code_response = "404"', 'code_response');

    $datas = array(
      'configuration' => $this->configuration->getProperty('LAST_ANALYSIS'),
      'crawl_day' => @$crawl_today,
      'crawl_days' => $crawl_days,
      'fourofour' => array('today' => (int)@$fourofour_today[0]->count,
        '30days' => $fourofour_days[0]->count)
    );

    $this->layout->view('dashboard/index', $datas);
  }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */