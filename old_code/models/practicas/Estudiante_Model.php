<?php

class Estudiante_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }

  public function crear_estudiante($dataEstudiante)
  {
    $this->db->select('*');
    $this->db->from('alumnos');
    $this->db->where('alumnos.run', $dataEstudiante['run']);
    if (!($this->db->count_all_results() > 0)) {
      $resultado = $this->db->insert('alumnos', $dataEstudiante);
      if ($resultado > 0) {
        return $this->db->insert_id();
      } else {
        return 0;
      }
    } else {
      return 0;
    }
  }

  public function validar_sesion($usuario, $contrasena)
  {

    $this->db->select('run,contrasena');
    $this->db->from('alumnos');
    $this->db->where('run', $usuario);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
      return password_verify($contrasena, $query->row()->contrasena);
    } else {
      return false;
    }
  }


  public function borarEstudianteById($id_estudiante)
  {
    $this->db->where('id', $id_estudiante);
    return $this->db->delete('alumnos');
  }

  public function update_estudiante($id_estudiante, $datos)
  {
    $this->db->where('id', $id_estudiante);
    return $this->db->update('alumnos', $datos);
  }


  public function get_estudiante($id)
  {
    $this->db->select('id, run, df, primer_nombre, segundo_nombre, apellido_paterno, apellido_materno, correo_personal, correo_institucional, telefono, ultimo_sem_aprobado, sede, anio_ingreso, sexo');
    $this->db->from('alumnos');
    $this->db->where('id', $id);
    $resultado = $this->db->get();
    return $resultado->row_array();
  }

  public function get_pass($id)
  {
    $this->db->select('contrasena');
    $this->db->from('alumnos');
    $this->db->where('id', $id);
    $resultado = $this->db->get();
    return $resultado->row_array();
  }

  public function get_id_by_run($run)
  {
    $this->db->select('id');
    $this->db->from('alumnos');
    $this->db->where('run', $run);
    $resultado = $this->db->get();
    return $resultado->row_array()['id'];
  }

}
