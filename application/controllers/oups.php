<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Oups extends CI_Controller
{

/*
======================================
			CONSTRUCTEUR
======================================
*/

	public function __construct()
	{
		parent::__construct();

	}

/*
======================================
			FONCTIONS
======================================
*/

	/*
	*	404 Override
	*/
	public function page_manquante()
	{
		$this->load->view('utilities/404');
	}
	
}
/* End of file oups.php */
/* Location: ./application/controllers/oups.php */