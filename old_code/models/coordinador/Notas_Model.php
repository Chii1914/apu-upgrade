<?php

class Notas_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->database();
  }

  public function crear_notas($dataNotas)
  {
    $resultado = $this->db->insert('notas', $dataNotas);
    if ($resultado) {
      return $this->db->insert_id();
    } else {
      return 0;
    }
  }

  public function get_notas($notas_id)
  {
    $this->db->select('*');
    $this->db->from('notas');
    $this->db->where('id', $notas_id);
    $query = $this->db->get();
    $res = $query->row_array();
    return $res;
  }

  public function obtenerNotasByPracticaId($practicaId)
  {
    $this->db->select('nota_promedio');
    $this->db->from('notas');
    $this->db->where('practicaId', $practicaId);

    $query = $this->db->get();
    $res = $query->row_array();
    return $res;
  }

  public function obtener_notas_por_practicaId($practicaId)
  {
    $this->db->select('*');
    $this->db->from('notas');
    $this->db->where('practicaId', $practicaId);

    $query = $this->db->get();
    $res = $query->row_array();
    return $res;
  }

  public function update_notas($notasId ,$notas)
  {
    $this->db->where('id', $notasId);
    return $this->db->update('notas', $notas);
  }
}
