<?php

class RegionComunaHelperModel extends CI_Model {

        public function __construct() {
                parent::__construct();
                //$this->load->database();
        }

        public function getRegiones()
        {
                $this->db->select('id,nombre');
                $this->db->order_by('id', 'ASC');
                $this->db->from('region');
                $resultado = $this->db->get();
                return $resultado->result_array();

        }

        public function getRegion($regionId)
        {
            $this->db->select('id, nombre, simbolo');
            $this->db->from('region');
            $this->db->where('id', $regionId);
            $resultado = $this->db->get();
            return $resultado->row_array();
        }

        public function getComuna($comunaId)
        {
            $this->db->select('id, nombre, id_region');
            $this->db->from('comuna');
            $this->db->where('id', $comunaId);
            $resultado = $this->db->get();
            return $resultado->row_array();
        }


        public function getSupervisor($supervisorId)
        {
            $this->db->select('nombre, cargo, correo');
            $this->db->from('supervisor');
            $this->db->where('id', $supervisorId);
            $resultado = $this->db->get();
            return $resultado->row_array();
        }


        public function getComunasByRegion($id_region)
        {
                $this->db->select('id,nombre');
                $this->db->order_by('nombre', 'ASC');
                $this->db->from('comuna');
                $this->db->where('id_region', $id_region);
                $resultado = $this->db->get();
                return $resultado->result_array();

        }

        public function getNombreRegionByRegionId($id_region)
        {
                $this->db->select('nombre');
                $this->db->from('region');
                $this->db->where('id', $id_region);
                $resultado = $this->db->get();
                return $resultado->row_array();

        }

        public function getNombreComunaByRegionComunaId($id_region, $id_comuna)
        {
                $this->db->select('nombre');
                $this->db->from('comuna');
                $this->db->where('id_region', $id_region);
                $this->db->where('id', $id_comuna);
                $resultado = $this->db->get();
                return $resultado->row_array();

        }


}

?>