<?php

class Administrador_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }


  public function get_administrador_by_usuario($usuario)
  {
    $this->db->select('id,usuario,nombre,apellido,correo,sede,tipo_usuario');
    $this->db->from('usuarios');
    $this->db->where('usuario', $usuario);
    $this->db->where('tipo_usuario', 1);
    $query = $this->db->get();
    $res = $query->row_array();
    return $res;
  }

  public function get_administrador($admin_id)
  {
    $this->db->select('id,usuario,nombre,apellido,correo,sede,tipo_usuario');
    $this->db->from('usuarios');
    $this->db->where('id', $admin_id);
    $this->db->where('tipo_usuario', 1);
    $query = $this->db->get();
    $res = $query->row_array();
    return $res;
  }

  public function actualizar_administrador($admin_id, $datos)
  {
    $this->db->where('id', $admin_id);
    $this->db->where('tipo_usuario', 1);
    return $this->db->update('usuarios', $datos);
  }

  public function get_pass($admin_id)
  {
    $this->db->select('contrasena');
    $this->db->from('usuarios');
    $this->db->where('id', $admin_id);
    $this->db->where('tipo_usuario', 1);
    $query = $this->db->get();
    $res = $query->row_array();
    return $res;
  }

  public function update_pass($admin_id, $datos)
  {
    $this->db->where('id', $admin_id);
    return $this->db->update('usuarios', $datos);
  }
}
