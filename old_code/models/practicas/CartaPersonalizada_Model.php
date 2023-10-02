<?php

class CartaPersonalizada_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }

  public function crear_cartaPersonalizada($carta)
  {
    $resultado = $this->db->insert('carta_recomendacion_personalizada', $carta);
    if($resultado){
      return $this->db->insert_id();
    }else{
      return 0;
    }
  }


  public function actualizar_carta_personalizada($cper_id , $datos){
    $this->db->where('id', $cper_id);
    return $this->db->update('carta_recomendacion_personalizada', $datos);
  }

  public function get_carta_personalizada($estudiante_id)
  {
    $this->db->select('id, estudiante_id, nombre_organismo, nombre_supervisor, sexo_supervisor, cargo_supervisor, division_departamento, seccion_unidad , cantidad_generada, revisado, nombre_archivo, fecha_creado, fecha_actualizacion');
    $this->db->from('carta_recomendacion_personalizada');
    $this->db->where('estudiante_id', $estudiante_id);
    $resultado = $this->db->get();
    return $resultado->row_array();
  }

  public function count_cp_de_estudiante($estudiante_id)
  {
    $this->db->from('alumnos');
    $this->db->join('carta_recomendacion_personalizada', ' alumnos.id = carta_recomendacion_personalizada.estudiante_id');
    $this->db->where('alumnos.id', $estudiante_id);
    return $this->db->count_all_results();
  }



}
