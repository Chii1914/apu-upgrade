<?php

class Coordinador_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }


  public function get_coordinador($usuario)
  {
    $this->db->select('id,usuario,nombre,apellido,correo,sede,tipo_usuario');
    $this->db->from('usuarios');
    $this->db->where('usuario', $usuario);
    $this->db->where('tipo_usuario', 2);
    $query = $this->db->get();
    $res = $query->row_array();
    return $res;
  }

  public function get_pass($coord_id)
  {
    $this->db->select('contrasena');
    $this->db->from('usuarios');
    $this->db->where('id', $coord_id);
    $this->db->where('tipo_usuario', 2);
    $query = $this->db->get();
    $res = $query->row_array();
    return $res;
  }

  public function update_pass($id_coordinador, $datos)
  {
    $this->db->where('id', $id_coordinador);
    return $this->db->update('usuarios', $datos);
  }


}
