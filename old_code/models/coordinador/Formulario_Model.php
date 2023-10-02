<?php

class Formulario_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }

  public function get_formularios($estado)
  {
    $this->db->select('alumnos.id,alumnos.run,alumnos.primer_nombre,alumnos.segundo_nombre,alumnos.apellido_paterno,alumnos.apellido_materno,alumnos.anio_ingreso,
                practica.ocasion, practica.estado, practica.id as practicaId, practica.nombre_archivo');
    $this->db->join('practica', 'practica.alumnoId = alumnos.id');
    $this->db->where('alumnos.sede', $this->session->userdata('sede'));
    $this->db->where('practica.estado', $estado);
    $this->db->order_by('alumnos.id', 'DESC');
    $query = $this->db->get('alumnos');
    $res = $query->result_array();
    return $res;
  }

  public function get_formularios_aceptados_sin_evaluar()
  {
    $this->db->select('alumnos.id,alumnos.run,alumnos.primer_nombre,alumnos.segundo_nombre,alumnos.apellido_paterno,alumnos.apellido_materno,alumnos.anio_ingreso,
                practica.ocasion, practica.estado, practica.id as practicaId, practica.nombre_archivo, practica.fecha_creado, practica.fecha_actualizacion');
    $this->db->join('practica', 'practica.alumnoId = alumnos.id');
    $this->db->where('alumnos.sede', $this->session->userdata('sede'));
    $this->db->where('practica.estado', "Aceptada");
    $this->db->where('practica.evaluacionId', null);
    $this->db->order_by('alumnos.id', 'DESC');
    $query = $this->db->get('alumnos');
    $res = $query->result_array();
    return $res;
  }

  public function get_formularios_evaluacion($evaluacion)
  {
    $this->db->select('alumnos.id,alumnos.run,alumnos.primer_nombre,alumnos.segundo_nombre,alumnos.apellido_paterno,alumnos.apellido_materno,alumnos.anio_ingreso,
                practica.ocasion, practica.estado, practica.id as practicaId, practica.nombre_archivo, evaluaciones.evaluacion');
    $this->db->join('practica', 'practica.alumnoId = alumnos.id');
    $this->db->join('evaluaciones', 'practica.evaluacionId = evaluaciones.id');
    $this->db->where('alumnos.sede', $this->session->userdata('sede'));
    $this->db->where('practica.estado', "Aceptada");
    $this->db->where('evaluaciones.evaluacion', $evaluacion);
    $this->db->order_by('alumnos.id', 'DESC');
    $query = $this->db->get('alumnos');
    $res = $query->result_array();
    return $res;
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
