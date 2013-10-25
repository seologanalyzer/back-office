<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*	Form Validation
*
*	>	contient les règles des champs pour les validation de formulaires
*	>	chaque tableau correspond à un formulaire
*	>	chaque sous-tableau correspond à un champs du formulaire
*/

$config = array(
				/*	Form : authentification
				***************************
				*/
				'connect' => array(
					//	User
					array(
							'field' => 'user',
							'label' => 'lang:label_login',
							'rules' => 'trim|required'
						 ),
					//	Password
					array(
							'field' => 'password',
							'label' => 'lang:label_motDePasse',
							'rules' => 'trim|required|alpha_numeric'
						 )
				)
			);
			
/* End of file form_validation.php */
/* Location: ./application/config/form_validation.php */