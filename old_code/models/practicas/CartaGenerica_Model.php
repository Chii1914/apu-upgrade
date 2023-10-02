<?php

class CartaGenerica_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }

  public function crear_cartaGenerica($carta)
  {
    $resultado = $this->db->insert('carta_recomendacion_generica', $carta);
    if ($resultado) {
      return $this->db->insert_id();
    } else {
      return 0;
    }
  }
  
  public function actualizar_carta_generica($cg_id, $datos)
  {
    $this->db->where('id', $cg_id);
    return $this->db->update('carta_recomendacion_generica', $datos);
  }

  public function get_carta_generica($estudiante_id)
  {
    $this->db->select('id, estudiante_id, cantidad_generada, nombre_archivo, fecha_creado, fecha_actualizacion');
    $this->db->from('carta_recomendacion_generica');
    $this->db->where('estudiante_id', $estudiante_id);
    $resultado = $this->db->get();
    return $resultado->row_array();
  }


  public function count_cg_de_estudiante($estudiante_id)
  {
    $this->db->from('alumnos');
    $this->db->join('carta_recomendacion_generica', ' alumnos.id = carta_recomendacion_generica.estudiante_id');
    $this->db->where('alumnos.id', $estudiante_id);
    return $this->db->count_all_results();
  }
}
