<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

// -----------------------------------------------------------------------------

class MY_Model extends CI_Model {
  /*
    ======================================
    FONCTIONS
    ======================================
   */

  /**
   *  Insère une nouvelle ligne dans la base de données.
   *  + (array) escaped attributes
   *  + (array) non escaped attributes
   */
  public function create($options_echappees = array(), $options_non_echappees = array()) {
    //  Vérification des données à insérer
    if (empty($options_echappees) && empty($options_non_echappees)) {
      return FALSE;
    }

    return (bool) $this->db->set($options_echappees)
                    ->set($options_non_echappees, null, false)
                    ->insert($this->table);
  }

  /**
   *  Récupère toutes les les données dans la base de données.
   *  + order_by
   */
  public function read_all($order_by = array()) {

    if (!empty($order_by)) {
      foreach ($order_by as $field) {
        $this->db->order_by($field);
      }
    }

    return $this->db->select('*')
                    ->from($this->table)
                    ->get()
                    ->result();
  }

  /**
   *  Modifie une ou plusieurs lignes dans la base de données.
   */
  public function update($where, $options_echappees = array(), $options_non_echappees = array()) {
    //  Vérification des données à mettre à jour
    if (empty($options_echappees) && empty($options_non_echappees)) {
      return FALSE;
    }

    //  Raccourci dans le cas où on sélectionne l'id
    if (is_integer($where)) {
      $key = 'id_' . $this->table;
      $where = array($key => $where);
    }

    return (bool) $this->db->set($options_echappees)
                    ->set($options_non_echappees, null, false)
                    ->where($where)
                    ->update($this->table);
  }

  /**
   *  Supprime une ou plusieurs lignes de la base de données.
   */
  public function delete($where) {
    if (is_integer($where)) {
      $key = 'id_' . $this->table;
      $where = array($key => $where);
    }

    return (bool) $this->db->where($where)
                    ->delete($this->table);
  }

  /**
   *  Retourne le nombre de résultats.
   *  > Si $champ est un array, la variable $valeur sera ignorée par la méthode where()
   */
  public function count($champ = array(), $valeur = null) {
    return (int) $this->db->where($champ, $valeur)
                    ->from($this->table)
                    ->count_all_results();
  }

  /**
   *  Avoid value="0" for an empty float
   *    > also innopinent "<br>" with jQuery NiceEdit
   */
  public function set_null($value = '', $force_null = FALSE) {
    if ($force_null == TRUE && ($value === 0 || $value === '0')) {
      return NULL;
    }

    return $value == '' || $value == '<br>' ? NULL : $value;
    //return $value == '' ? NULL : $value;
  }

  /*
    ----------------------------------
    @ SLA
    ----------------------------------
   */

  public function getProperty($name) {

    return $this->db->select('value')
                    ->from($this->table)
                    ->where('name', $name)
                    ->get()
                    ->row();
  }

  public function setProperty($post) {

    $name = key($post);
    $value = $post[$name];

    $query = 'INSERT INTO `' . SLA_DB_PREFIX . $this->table . "` VALUES ('NULL', '" . $name . "', '" . $value . "')"
            . "ON DUPLICATE KEY UPDATE value = '" . $value . "'";

    return (bool) $this->db->query($query);
  }

  public function get($value = array(), $where = array()) {

    return $this->db->select($value)
                    ->from($this->table)
                    ->where($where)
                    ->get()
                    ->result();
  }

  /*
    ----------------------------------
    @ MA
    ----------------------------------
   */

  /*
    ----------------------------------
    @ HU
    ----------------------------------
   */

  /*
   * @HU
   *
   * Un listage général des élements d'une table
   * + limit     (string)
   * + offset      (string)
   * + order by    (string)
   * + clause where  (array/custom string)
   * + select      (string)
   *
   *   > chacun des arguments peuvent être nuls
   */

  public function list_elements($limit = null, $offset = null, $order_by = null, $select = '*', $where = null) {

    $this->db->select($select);

    $this->db->from($this->table);

    if (!empty($where)) {
      $this->db->where($where);
    }

    if (!empty($order_by)) {
      $this->db->order_by($order_by);
    }

    if (!empty($limit) && !empty($offset)) {
      $this->db->limit($limit, $offset);
    } else if (!empty($limit) && empty($offset)) {
      $this->db->limit($limit);
    }

    return $this->db->get()
                    ->result();
  }

  /*
    ----------------------------------
    @ AE
    ----------------------------------
   */

  /*
   * @AE
   *
   * Retourne les infos à partir d'un ID donné
   * + id
   */

  public function read_this_id($id) {
    return $this->db->select('*')
                    ->from($this->table)
                    ->where('id_' . $this->table, $id)
                    ->get()
                    ->row(0);
  }

  /*
   * @AE
   *
   * L'élément existe-t-il ?
   * + id
   * + redirect_page [default: null]
   *
   * V2 :
   *   //  utilisation du model droit d'acces
   *   //  redirection auto si éléments n'existe pas
   *   //  se focalise sur l'id de l'élément
   *   //  marche en complément avec la private function éponyme
   */

  public function element_id_exists($id, $redirect_page = NULL) {
    //  Vérifie la validité de l'id donné
    if (!( intval($id) > 0 OR intval(is_int($id)) )) {
      $this->droitdacces->redirect_user($redirect_page);
    }

    //  Vérifie si l'id existe bien
    if (!$this->_element_id_exists($id)) {
      $this->droitdacces->redirect_user($redirect_page);
    }
  }

  private function _element_id_exists($id) {
    return (bool) $this->db->select('id_' . $this->table)
                    ->from($this->table)
                    ->where('id_' . $this->table, $id)
                    ->limit(1)
                    ->get()
                    ->num_rows();
  }

  /*
   * @AE
   *
   * Upload d'une image
   * + (string) post file name
   * + (string) max width   [default: 1024] (px)
   * + (string) max height  [default: 768] (px)
   * + (string) max size    [default: 512] (kb)
   *
   *   > renvoie le nom de l'image en cas de succès
   *   > renvoie null en cas d'erreur
   */

  public function upload_picture($post_file_name, $max_width = '2048', $max_height = '1024', $max_size = '512') {
    //  Configuration de l'upload
    $config['upload_path'] = './assets/uploads/pictures/';
    $config['allowed_types'] = 'gif|jpg|png|bmp';
    $config['max_size'] = $max_size;
    $config['max_width'] = $max_width;
    $config['max_height'] = $max_height;
    $config['file_name'] = str_replace('.', '', uniqid('picture-', TRUE));
    $this->load->library('upload', $config);

    //  Upload de la picture
    if ($this->upload->do_upload($post_file_name)) {
      //  Récupération du nom de la picture
      $data = $this->upload->data();
      return $data['file_name'];
    }

    //  En cas d'erreur renvoie null
    else {
      return null;
    }
  }

  /*
   * @AE
   *
   * Retourne la valeur d'ordre par défaut assujeti à un futur éléments
   */

  public function return_default_element_order() {
    $nb_elements = $last_entry_id = $this->db->select('id_' . $this->table)
            ->from($this->table)
            ->limit(1)
            ->order_by('id_' . $this->table . ' DESC')
            ->get()
            ->row('id_' . $this->table);

    if (empty($nb_elements)) {
      return '0';
    } else {
      return (string) $nb_elements;
    }
  }

  /*
   * @AE
   *
   * /!\ présence d'un layout message à la fin de la fonction
   *
   *
   * Change l'ordre des éléments donnés
   * + input_value
   *
   *   . Les données transmises par l'input_value['order'] sont implosées
   *   . On effectue dont un premier travail de dissociation des requêtes
   *     en suivant le modèle 'id' => 'ordre'
   */

  public function change_order($input_value) {
    //  Mise en place des requête suivant le modèle : 'id' => 'ordre'
    $queries = array();
    $i = 0;
    $values = explode(",", $input_value['order']);

    foreach ($values as $key => $value) {

      //  ID
      if ($key % 2 == 0) {
        $queries[$i]['id_' . $this->table] = $value;
      }

      //  Ordre
      else {
        $queries[$i]['order'] = $value;
        $i ++;
      }
    }

    //  Appel des requêtes
    foreach ($queries as $query) {
      $this->_change_order($query['id_' . $this->table], $query['order']);
    }

    $this->layout->add_message("Changement d'ordre effectué", 'success');
  }

  private function _change_order($id, $ordre) {
    $attributes = array(
      'order' => $ordre
    );

    $where = array(
      'id_' . $this->table => $id
    );

    return $this->db->set($attributes)
                    ->where($where)
                    ->update($this->table);
  }

  /*
   * @AE
   *
   * Simple Search
   * + query
   * + fields
   *
   *   . search like for a query to each given fields
   *   . ONE query ! no pagination !
   */

  public function simple_search($query, $fields = array()) {
    $this->db->distinct()
            ->from($this->table);

    foreach ($fields as $key => $field) {
      if ($key == 0)
        $this->db->like($field, $query);
      else
        $this->db->or_like($field, $query);
    }

    return $this->db->get()
                    ->result();
  }

}

/* End of file MY_Model.php */
/* Location: ./system/application/core/MY_Model.php */