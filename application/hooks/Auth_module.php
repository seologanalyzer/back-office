<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Auth_module
{

	private $CI;
	
	
	public function __construct()
	{
		$this->CI =& get_instance();
	}
	
	public function set_auth()
	{
		$this->CI->load->model('m_authentification', 'authentification');
	}

}


/* End of file auth_module.php */
/* Location: ./application/hooks/auth_module.php */