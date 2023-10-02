<?php

class Evaluacion_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }

  public function ctn_evaluaciones_evaluacion_xestudiante($estudiante_id, $ocasion, $estado, $evaluacion)
  {
    $this->db->select();
    $this->db->from('practica');
    $this->db->join('evaluaciones', ' practica.evaluacionId = evaluaciones.id');
    $this->db->where('practica.alumnoId', $estudiante_id);
    $this->db->where('practica.ocasion', $ocasion);
    $this->db->where('practica.estado', $estado);
    $this->db->where('evaluaciones.evaluacion', $evaluacion);
    return $this->db->count_all_results();
  }


}
