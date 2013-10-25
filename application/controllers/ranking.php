<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ranking extends CI_Controller
{

/*
======================================
			CONSTRUCTEUR
======================================
*/

	public function __construct()
	{
		parent::__construct();
		
		//	Paramétrages du Layout
		$this->layout->set_theme('admin_simple');
		$this->layout->set_titre('SLA | Web Ranking');		
	}

/*
======================================
			FONCTIONS
======================================
*/

	public function index()
	{	
		$this->layout->view('view_example');
	}
	
	

	
}
/* End of file ranking.php */
/* Location: ./application/controllers/ranking.php */