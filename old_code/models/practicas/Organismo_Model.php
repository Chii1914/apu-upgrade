<?php

class Organismo_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }

  public function crear_organismo($dataOrganismo)
  {
    $resultado = $this->db->insert('organismo', $dataOrganismo);
    if ($resultado) {
      return $this->db->insert_id();
    } else {
      return 0;
    }
  }

}
