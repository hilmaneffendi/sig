<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_user extends CI_Model {
    function __construct(){
        parent::__construct();
    }
    function get_coordinates(){
        $return = array();
        $this->db->select("latitude,longitude");
        $this->db->from("t_penjahit");
        $this->db->where('status',1);
        $query = $this->db->get();
        if ($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                array_push($return, $row);
            }
        }
        return $return;
    }
   
    public function GetWhere($table, $data){
        $res=$this->db->get_where($table, $data);
        return $res->result_array();
    }
    public function GetPenjahit($table){
        $this->db->order_by('nama','ASC');
        $this->db->where('status',1);
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