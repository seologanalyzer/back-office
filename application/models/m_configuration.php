<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class M_configuration extends MY_Model {
  /*
    ======================================
    CHAMPS
    ======================================
   */
  /*
   * 	Table : contact
   */

  protected $table = "configuration";

  /*
    ======================================
    FONCTIONS
    ======================================
   */

  public function getConfiguration($name) {

    return $this->db->select('value')
                    ->from($this->table)
                    ->where('name', $name)
                    ->get()
                    ->row();
  }

  public function setConfiguration($post) {

    $name = key($post);
    $value = $post[$name];

    $query = 'INSERT INTO `' . SLA_DB_PREFIX . $this->table . "` VALUES ('NULL', '" . $name . "', '" . $value . "')"
            . "ON DUPLICATE KEY UPDATE value = '" . $value . "'";

    return (bool) $this->db->query($query);
  }

}

/* End of file m_configuration.php */
/* Location: ./application/models/m_configuration.php */