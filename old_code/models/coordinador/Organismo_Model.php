<?php

class Organismo_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }

  /******************** */
  public function get_organismo($organismoId)
  {
    $this->db->select('nombre_organismo, direccion, regionId, comunaId, telefono, division_departamento, seccion_unidad');
    $this->db->from('organismo');
    $this->db->where('id', $organismoId);
    $resultado = $this->db->get();
    return $resultado->row_array();
  }
}
