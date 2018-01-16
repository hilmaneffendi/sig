<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_jenis_penjahit extends CI_Model {
    
    function getData(){
        $query = $this->db->get('t_jenis_penjahit')->result();
        return $query;
    }
      public function GetWhere($table, $data){
        $res=$this->db->get_where($table, $data);
        return $res->result_array();
    }
    public function GetPenjahit($table){
        $this->db->order_by('nama','ASC');
       /* $this->db->where('status',1);*/
        $res=$this->db->get($table); 
        return $res->result_array(); 
    }
    public function Insert($table, $data){
        $res = $this->db->insert($table, $data);
        return $res;
    }
    public function Update($table, $data, $where){
        $res = $this->db->update($table, $data, $where); 
        return $res;
    }
 
    public function Delete($table, $where){
        $res = $this->db->delete($table, $where); 
        return $res;
    }
}