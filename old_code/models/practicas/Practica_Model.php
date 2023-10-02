<?php

class Practica_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }

  public function crear_practica($dataPractica)
  {
    $resultado = $this->db->insert('practica', $dataPractica);
    return $this->db->insert_id();
  }

  public function get_practicas_by_alumnoId($alumnoId, $ocasion)
  {
    $this->db->select('practica.id, practica.alumnoId, practica.organismoId, practica.supervisorId, practica.evaluacionId, practica.ocasion, practica.estado, practica.descripcion_estado, practica.fecha_actualizacion, practica.nombre_archivo, evaluaciones.evaluacion');
    $this->db->from('practica');
    $this->db->join('evaluaciones', ' evaluaciones.id = practica.evaluacionId', 'left');
    $this->db->where('alumnoId', $alumnoId);
    $this->db->where('ocasion', $ocasion);
    $this->db->order_by('practica.fecha_actualizacion', 'DESC');
    $resultado = $this->db->get();
    return $resultado->result_array();
  }

}
