<?php

class DirectorModel extends CI_Model {

        public function __construct() {
                parent::__construct();

        }

        public function nombreDirector(){

            $this->db->select('nombre_director');
            $this->db->from('config');
            $this->db->where('sede', 'Valparaíso');
            $query = $this->db->get();
            $res = $query->row_array();
            return $res['nombre_director'];
            
        }

        public function firmaDirector(){
            
            $this->db->select('firma');
            $this->db->from('config');
            $this->db->where('sede', 'Valparaíso');
            $query = $this->db->get();
            $res = $query->row_array();
            return $res['firma'];
            
        }

}

?>