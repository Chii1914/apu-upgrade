<?php

class Horario_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }

  public function crear_horario($dataHorario)
  {
    $resultado = $this->db->insert('horario', $dataHorario);
    return $resultado;
  }

}
