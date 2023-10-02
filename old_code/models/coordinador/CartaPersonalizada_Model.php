<?php

class CartaPersonalizada_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }

  public function get_cartasPersonalizadas()
  {
    $this->db->select('carta_recomendacion_personalizada.id, run, primer_nombre, segundo_nombre, apellido_paterno, apellido_materno, carta_recomendacion_personalizada.nombre_archivo, carta_recomendacion_personalizada.revisado, carta_recomendacion_personalizada.fecha_creado, carta_recomendacion_personalizada.fecha_actualizacion');
    $this->db->from('alumnos');
    $this->db->join('carta_recomendacion_personalizada', ' alumnos.id = carta_recomendacion_personalizada.estudiante_id');
    $this->db->where('sede', $this->session->userdata('sede'));
    $this->db->order_by('carta_recomendacion_personalizada.id','DESC');
    $query = $this->db->get();
    $res = $query->result_array();
    return $res;
  }
  
  public function actualizar_carta_personalizada($cp_id, $datos)
  {
    $this->db->where('id', $cp_id);
    return $this->db->update('carta_recomendacion_personalizada', $datos);
  }

  public function eliminar_carta_personalizada($cg_id)
  {
    $this->db->where('id', $cg_id);
    return $this->db->delete('carta_recomendacion_personalizada');
  }
}
