<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_slider extends CI_Model {
    
    function getData(){
        $this->db->order_by('urut','ASC');
        $query = $this->db->get('t_slider')->result();
        return $query;
    }
     public function Delete($table, $where){
        $res = $this->db->delete($table, $where); 
        return $res;
    }
    public function Update($table, $data, $where){
        $res = $this->db->update($table, $data, $where); 
        return $res;
    }
}