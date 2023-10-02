<?php

class Supervisor_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }

  public function crear_supervisor($dataSupervisor)
  {
    $resultado = $this->db->insert('supervisor', $dataSupervisor);
    if ($resultado) {
      return $this->db->insert_id();
    } else {
      return 0;
    }
  }

}
