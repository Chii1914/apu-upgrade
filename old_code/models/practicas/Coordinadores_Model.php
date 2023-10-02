<?php

class Coordinadores_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }


  public function get_coordinador_by_sede($sede)
  {
    $this->db->select('id,usuario,nombre,apellido,correo,sede');
    $this->db->from('usuarios');
    $this->db->where('sede', $sede);
    $query = $this->db->get();
    $res = $query->row_array();
    return $res;
  }



}
