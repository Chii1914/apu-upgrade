<?php

class Director_Model extends CI_Model {

        public function __construct() {
                parent::__construct();

        }

        public function get_firmas(){

            $this->db->select('id, nombre_firmante, vocativo, firma_sec, cargo, sede');
            $this->db->from('firmas');
            
            $query = $this->db->get();
            $res = $query->result_array();
            return $res;
            
        }

        public function get_firma($director_id){

            $this->db->select('id, nombre_firmante, vocativo, firma_sec, sede ');
            $this->db->from('firmas');
            $this->db->where('id', $director_id);
            $query = $this->db->get();
            $res = $query->row_array();
            return $res;
            
        }

        public function actualizar_director($id_director, $datos)
        {
          $this->db->where('id', $id_director);
          return $this->db->update('firmas', $datos);
        }


       

}

?>