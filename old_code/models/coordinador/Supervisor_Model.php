<?php

class Supervisor_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }

  /********************* */
  public function get_supervisor($supervisorId)
  {
    $this->db->select('nombre, cargo, correo');
    $this->db->from('supervisor');
    $this->db->where('id', $supervisorId);
    $resultado = $this->db->get();
    return $resultado->row_array();
  }
}
