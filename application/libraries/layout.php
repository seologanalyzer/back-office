<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
	private $CI;
	private $var = array();
	private $theme = 'default';
	
/*
|===============================================================================
| Constructeur
|===============================================================================
*/
	
	public function __construct()
	{
		$this->CI =& get_instance();
		
		$this->var['output'] = '';
		
		//	Le titre est composé du nom de la méthode et du nom du contrôleur
		//	La fonction ucfirst permet d'ajouter une majuscule
		$this->var['titre'] = ucfirst($this->CI->router->fetch_method()) . ' - ' . ucfirst($this->CI->router->fetch_class());
		
		//	Meta Description [default: null]
		$this->var['description'] = NULL;
		
		//	Meta KeyWords [array]
		$this->var['keywords'] = array();
		
		//	Nous initialisons la variable $charset avec la même valeur que
		//	la clé de configuration initialisée dans le fichier config.php
		$this->var['charset'] = $this->CI->config->item('charset');
		
		$this->var['css'] = array();
		$this->var['js']  = array();
		
		$this->var['message_error']   = array();
		$this->var['message_warning'] = array();
		$this->var['message_success'] = array();
		$this->var['message_info']    = array();
		
		//	Template includes [default: null]
		$this->var['include_header'] = NULL;
		$this->var['include_footer'] = NULL;
	}
	
/*
|===============================================================================
| Méthodes pour charger les vues
|	. view
|	. views
|===============================================================================
*/
	
	public function view($name, $data = array())
	{
		$this->var['output'] .= $this->CI->load->view($name, $data, true);
		
		$this->CI->load->view('../themes/' . $this->theme, $this->var);
	}
	
	public function views($name, $data = array())
	{
		$this->var['output'] .= $this->CI->load->view($name, $data, true);
		return $this;
	}
	
	/*
	|===============================================================================
	| Méthodes pour modifier les variables envoyées au layout
	|	. set_titre
	|	. set_charset
	|	. set_description
	|===============================================================================
	*/
	public function set_titre($titre)
	{
		if(is_string($titre) AND !empty($titre))
		{
			$this->var['titre'] = $titre;
			return true;
		}
		return false;
	}

	public function set_charset($charset)
	{
		if(is_string($charset) AND !empty($charset))
		{
			$this->var['charset'] = $charset;
			return true;
		}
		return false;
	}
	
	public function set_description($description)
	{
		if (is_string($description) AND !empty($description))
		{
			$this->var['description'] = $description;
			return TRUE;
		}
		return FALSE;
	}
	
	public function set_template_include($include, $view)
	{
		if ( is_string($include) 									AND 
			 is_string($view) 										AND
			 array_key_exists('include_' . $include, $this->var) 	AND
			 ! empty($include) 										AND 
			 ! empty($view)											)
		{
			$this->var['include_' . $include] = $view;
		}
		return FALSE;
	}
	
	/*
	|===============================================================================
	| Méthodes pour ajouter des feuilles de CSS et de JavaScript
	|	. add_css
	|	. add_js
	|===============================================================================
	*/
	
	public function add_message($message, $type = 'info')
	{
		switch($type)
		{
			case 'error' :
				$this->var['message_error'][] = $message;
				break;
			case 'warning' :
				$this->var['message_warning'][] = $message;
				break;
			case 'success' :
				$this->var['message_success'][] = $message;
				break;
			default :
				$this->var['message_info'][] = $message;
				break;
		}
	}
	
	public function add_keywords($keywords)
	{
		if ( is_string($keywords) && !empty($keywords) )
		{
			$this->var['keywords'][] = $keywords;
			return TRUE;
		}
		else if ( is_array($keywords) )
		{
			foreach ($keywords as $keyword)
			{
				if ( is_string($keyword) )
					$this->var['keywords'][] = $keyword;
				else
					return FALSE;
			}
			return TRUE;
		}
		return FALSE;
	}
	
	public function add_css($nom)
	{
		if(is_string($nom) AND !empty($nom) AND file_exists('./assets/css/' . $nom . '.css'))
		{
			$this->var['css'][] = css_url($nom);
			return true;
		}
		return false;
	}

	public function add_js($nom)
	{
		if(is_string($nom) AND !empty($nom) AND file_exists('./assets/javascript/' . $nom . '.js'))
		{
			$this->var['js'][] = js_url($nom);
			return true;
		}
		return false;
	}
	
	// Méthode pour modifier le thème, s'il n'existe pas alors on ne modifie rien
	public function set_theme($theme)
	{
		if(is_string($theme) AND !empty($theme) AND file_exists('./application/themes/' . $theme . '.php'))
		{
			$this->theme = $theme;
			return true;
		}
		return false;
	}
}

/* End of file layout.php */
/* Location: ./application/libraries/layout.php */