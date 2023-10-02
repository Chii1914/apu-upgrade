<?php

class Login_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function validar($usuario, $contrasena)
  {

    $this->db->select('usuario,contrasena');
    $this->db->from('usuarios');
    $this->db->where('usuario', $usuario);
    $this->db->where('tipo_usuario', 2);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
      if($usuario === $query->row()->usuario){
        return password_verify($contrasena, $query->row()->contrasena);
      } else {
        return false;
      }
    }else{
      return false;
    }
  }

  public function get_sede($usuario)
  {

    $this->db->select('sede');
    $this->db->from('usuarios');
    $this->db->where('usuario', $usuario);
    $this->db->where('tipo_usuario', 2);
    $query = $this->db->get();
    $res = $query->row_array();
    return $res['sede'];
  }
}
