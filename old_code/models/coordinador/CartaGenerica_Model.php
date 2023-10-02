<?php

class CartaGenerica_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }



  public function get_cartasGenericas()
  {
    $this->db->select('carta_recomendacion_generica.id,run, primer_nombre, segundo_nombre, apellido_paterno, apellido_materno, carta_recomendacion_generica.revisado ,carta_recomendacion_generica.nombre_archivo, carta_recomendacion_generica.fecha_actualizacion , carta_recomendacion_generica.fecha_creado');
    $this->db->from('alumnos');
    $this->db->join('carta_recomendacion_generica', ' alumnos.id = carta_recomendacion_generica.estudiante_id');
    $this->db->where('alumnos.sede', $this->session->userdata('sede'));
    $this->db->order_by('carta_recomendacion_generica.id','DESC');
    $query = $this->db->get();
    $res = $query->result_array();
    return $res;
  }

  public function actualizar_carta_generica($cg_id, $datos)
  {
    $this->db->where('id', $cg_id);
    return $this->db->update('carta_recomendacion_generica', $datos);
  }
  

 
    /*
    $this->db->set('estado', $estado);
    $this->db->set('fecha_cambio_estado', $fechaCambioEstado);
    $this->db->where('id', $practicaId);
    $this->db->where('evaluacionId', null);
    return $this->db->update('practica');
    */
  

  
  public function eliminar_carta_generica($cg_id)
  {
    $this->db->where('id', $cg_id);
    return $this->db->delete('carta_recomendacion_generica');
  }

}
