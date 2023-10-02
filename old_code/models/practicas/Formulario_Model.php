<?php

class Formulario_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }

  public function actualizar_formulario($practica_id, $datos)
  {
    $this->db->where('id', $practica_id);
    return $this->db->update('practica', $datos);
  }



  public function count_forms_de_estudiante($estudiante_id, $ocasion)
  {
    $this->db->from('alumnos');
    $this->db->join('practica', ' alumnos.id = practica.alumnoId');
    $this->db->where('alumnos.id', $estudiante_id);
    $this->db->where('practica.ocasion', $ocasion);
    return $this->db->count_all_results();
  }




  public function ctn_formulario_estado_xestudiante_sin_evaluar($estudiante_id, $ocasion, $estado)
  {
    $this->db->select();
    $this->db->from('practica');
    $this->db->where('practica.alumnoId', $estudiante_id);
    $this->db->where('practica.ocasion', $ocasion);
    $this->db->where('practica.estado', $estado);
    $this->db->where('practica.evaluacionId', null);
    return $this->db->count_all_results();
  }


}
