<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentification extends CI_Controller
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
		$this->layout->set_theme('blank');
		$this->layout->set_titre('SLA | Authentification');
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning"><a class="close" data-dismiss="alert"></a>', '</div>');

	}

/*
======================================
			FONCTIONS
======================================
*/

	public function index()
	{		
		$this->connect();
	}

	public function connect()
	{
		//	Form Validation
		if ( $this->form_validation->run('connect') )
		{
			//	Validation des infos
			$this->authentification->connect( $this->input->post() );
		}
		
		$this->layout->view('utilities/connect');
	}
	
	public function disconnect()
	{
		$this->authentification->disconnect();
	}
	
	
}
/* End of file authentification.php */
/* Location: ./application/controllers/authentification.php */