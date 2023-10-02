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
    $this->db->where('tipo_usuario', 1);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
      return password_verify($contrasena, $query->row()->contrasena);
    } else {
      return false;
    }
  }


}
