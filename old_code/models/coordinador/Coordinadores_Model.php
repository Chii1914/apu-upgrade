<?php

class Coordinadores_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }



  public function get_coordinadores()
  {
    $this->db->select('id,usuario,nombre,apellido,correo,sede');
    $this->db->from('usuarios');
    $this->db->order_by('id','DESC');
    $this->db->where('tipo_usuario', "2");
    $query = $this->db->get();
    $res = $query->result_array();
    return $res;
  }
  public function get_coordinador($coordinador_id)
  {
    $this->db->select('id,usuario,nombre,apellido,correo,sede');
    $this->db->from('usuarios');
    $this->db->where('id', $coordinador_id);
    $query = $this->db->get();
    $res = $query->row_array();
    return $res;
  }

  public function get_coordinador_by_sede($sede)
  {
    $this->db->select('id,usuario,nombre,apellido,correo,sede');
    $this->db->from('usuarios');
    $this->db->where('sede', $sedes);
    $query = $this->db->get();
    $res = $query->row_array();
    return $res;
  }

  public function actualizar_coordinador($id_coordinador, $datos)
  {
    $this->db->where('id', $id_coordinador);
    return $this->db->update('usuarios', $datos);
  }


}
