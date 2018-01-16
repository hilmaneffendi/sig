<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_data_tamu extends CI_Model {
    
    function getDataTamu(){
        $this->db->order_by('id','DESC');
        $query = $this->db->get('t_tamu')->result();
        return $query;
    }
     public function Delete($table, $where){
        $res = $this->db->delete($table, $where); 
        return $res;
    }
}