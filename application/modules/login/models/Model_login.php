<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_login extends CI_Model {
    function __construct(){
        parent::__construct();
    }   
    public function GetWhere($table, $data){
        $res=$this->db->get_where($table, $data);
        return $res->result_array();
    }
    public function GetPenjahit($table){
        $this->db->order_by('nama','ASC');
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
    public function cek_user($data) {
        $query = $this->db->get_where('t_member', $data);
        return $query;
    }
}