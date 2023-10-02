<?php

class FirmadorModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function nombre_firmante($sede)
    {
        $this->db->select('nombre_firmante');
        $this->db->from('firmas');
        $this->db->where('sede', $sede);
        $query = $this->db->get();
        $res = $query->row_array();
        return $res['nombre_firmante'];
    }

    public function vocativo($sede)
    {
        $this->db->select('vocativo');
        $this->db->from('firmas');
        $this->db->where('sede', $sede);
        $query = $this->db->get();
        $res = $query->row_array();
        return $res['vocativo'];
    }

    public function firma_sec($sede)
    {
        $this->db->select('firma_sec');
        $this->db->from('firmas');
        $this->db->where('sede', $sede);
        $query = $this->db->get();
        $res = $query->row_array();
        return $res['firma_sec'];
    }

    public function cargo_firmante($sede)
    {
        $this->db->select('cargo');
        $this->db->from('firmas');
        $this->db->where('sede', $sede);
        $query = $this->db->get();
        $res = $query->row_array();
        return $res['cargo'];
    }
}
