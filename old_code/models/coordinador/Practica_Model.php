<?php

class Practica_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function estado_practica($practicaId)
  {
    $this->db->select('alumnos.primer_nombre, alumnos.segundo_nombre, alumnos.apellido_paterno, alumnos.apellido_materno, alumnos.run,
            practica.id AS practicaId, practica.ocasion, practica.fecha_inicio, practica.fecha_termino, practica.estado, 
            evaluaciones.evaluacion, evaluaciones.fecha_evaluacion
            ');
    $this->db->from('practica');
    $this->db->join('alumnos', 'alumnos.id = practica.alumnoId');
    $this->db->join('evaluaciones', 'evaluaciones.id = practica.evaluacionId');
    $this->db->join('notas', 'notas.id = evaluaciones.notasId');
    $this->db->where('practica.id', $practicaId);

    $query = $this->db->get();
    $res = $query->row_array();
    return $res;
  }

  public function actualizar_estado_practica($practicaId, $estado, $fechaCambioEstado)
  {

    $this->db->set('estado', $estado);
    $this->db->set('fecha_cambio_estado', $fechaCambioEstado);
    $this->db->where('id', $practicaId);
    $this->db->where('evaluacionId', null);
    return $this->db->update('practica');
  }

  public function get_practica($practicaId)
  {
    $this->db->select('id, alumnoId, organismoId, supervisorId, evaluacionId, ocasion, estado, descripcion, fecha_inicio, fecha_termino,homologacion,nombre_archivo, horas_practica');
    $this->db->from('practica');
    $this->db->where('id', $practicaId);
    $resultado = $this->db->get();
    return $resultado->row_array();
  }

  public function update_practica_por_practicaId( $practicaId ,$datos)
  {
    $this->db->where('id', $practicaId);
    return $this->db->update('practica', $datos);
  }
}
