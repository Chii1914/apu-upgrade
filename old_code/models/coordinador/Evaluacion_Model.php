<?php

class Evaluacion_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }

  public function crear_evaluacion($dataEvaluacion)
  {
    $resultado = $this->db->insert('evaluaciones', $dataEvaluacion);
    if ($resultado) {
      return $this->db->insert_id();
    } else {
      return 0;
    }
  }

  public function get_evaluacion($evaluacion_id)
  {
    $this->db->select('id, notasId,evaluacion');
    $this->db->from('evaluaciones');
    $this->db->where('id', $evaluacion_id);
    $query = $this->db->get();
    $res = $query->row_array();
    return $res;
  }

  public function update_evaluacion($evaluacionId, $datosEvaluacion)
  {
    $this->db->where('id', $evaluacionId);
    return $this->db->update('evaluaciones', $datosEvaluacion);
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
