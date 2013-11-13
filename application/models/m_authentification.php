<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class M_authentification extends MY_Model {
  /*
    ======================================
    CHAMPS
    ======================================
   */

  //	Variables d'authentification pour l'accès à la partie admin
  protected $auth_user = SLA_AUTH_USER;
  protected $auth_password = SLA_AUTH_PASSWORD;
  //	Variables pour les pages de redirection
  protected $redirect_usertype0 = 'authentification/connect';
  protected $redirect_usertype1 = 'dashboard/index';
  //	Langue par défaut
  protected $default_language = SLA_DEFAULT_LANGUAGE;

  /*
    ======================================
    CONSTRUCTEUR
    ======================================
   */

  public function __construct() {
    parent::__construct();

    //	Contrôle automatique des droits d'accès
    $this->_controle_droit_d_acces();

    //	Paramétrage de la langue
    $this->define_language();
  }

  /*
    ======================================
    FONCTIONS
    ======================================
   */

  /*
   * 	Authentification pour accéder au site
   * 	+	input_value (clean data from form_validation)
   * 	+	redirect_page (page de redirection en de succès
   *
   * 		> Redirection en cas de succès + cookie d'inscription
   */

  public function connect($input_value, $redirect_page = NULL) {
    //	Analyses des infos données
    if ($input_value['user'] === $this->auth_user && $input_value['password'] === $this->auth_password
    ) {
      $this->set_usertype(1);
      $this->redirect_user($redirect_page);
    } else {
      $this->layout->add_message($this->lang->line('msg_err_authEchouee'), 'error');
    }
  }

  /*
   * 	Déconnexion
   * 	+	redirect_page (page de redirection en cas de succès)
   *
   * 		> Déconnecte l'administrateur, redirection automatique
   */

  public function disconnect($redirect_page = NULL) {
    if (empty($redirect_page))
      $redirect_page = $this->redirect_usertype0;
    $this->set_usertype(0);
    $this->redirect_user($redirect_page);
  }

  /*
   * 	Définit la langue de l'IHM
   * 	+	language [optional]
   */

  public function define_language($language = NULL) {

    if ($this->session->userdata('language') === FALSE) {

      $this->session->set_userdata('language', $this->default_language);
    }

    if (!empty($language)) {
      $this->session->set_userdata('language', $language);
    }

    $this->lang->load($this->session->userdata('language'), $this->session->userdata('language'));
  }

  /*
   * 	Retourne le usertype de l'internaute
   * 		
   * 		> Si aucun usertype, alors en crée un
   */

  public function get_usertype() {
    if ($this->session->userdata('usertype') === FALSE) {
      $this->set_usertype(0);
      return (int) 0;
    } else {
      return (int) $this->session->userdata('usertype');
    }
  }

  /*
   * 	Définit le usertype
   * 	+ (int) usertype
   */

  public function set_usertype($usertype) {
    if (!is_int($usertype)) {
      $this->session->set_userdata('usertype', 0);
    } else {
      $this->session->set_userdata('usertype', $usertype);
    }
  }

  /*
   * 	Redirige l'utilisateur vers une page donnée
   * 	+	page de redirection
   */

  public function redirect_user($redirect_page = NULL) {

    $usertype = $this->get_usertype();

    if (empty($redirect_page)) {

      if ($usertype === 0) {
        $redirect_page = $this->redirect_usertype0;
      } else if ($usertype === 1) {
        $redirect_page = $this->redirect_usertype1;
      }
    }

    redirect($redirect_page);
  }

  /*
    ======================================
    METHODES
    ======================================
   */

  /*
   * 	Contrôle les droit d'accès de l'url sélectionnée par l'utilisateur
   * 	en fonction du type d'utilisateur
   *
   * 		. cas 1 (visiteur) : le visiteur accède à toutes les pages du front
   * 		ainsi que la page de connexion du back
   *
   * 		. cas 2 (admin) : l'admin consulte toutes les pages (sauf authentification)
   *
   * 		>> on a donc une architecture bivalente avec 2 types d'utilisateurs
   *
   */

  private function _controle_droit_d_acces() {
    $sURI = $this->uri->rsegment_array();
    $sCtrl = $sURI[1];
    $sFunc = $sURI[2];
    $uType = $this->get_usertype();

    if ($uType === 0 && $sCtrl !== 'authentification') {
      $this->redirect_user();
    } else if ($uType === 1 && $sCtrl === 'authentification') {
      if ($sFunc !== 'disconnect')
        $this->redirect_user();
      else
        return;
    }
    else if ($sCtrl === 'logger') {
      //todo or if remote ip == l'ip du serveur
      $this->redirect_user();
    }
  }

}

/* End of file m_authentification.php */
/* Location: ./application/models/m_authentification.php */