<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_buku_tamu extends CI_Model {
    
    function getBukuTamu(){
        $this->db->order_by('id','DESC');
        $query = $this->db->get('t_tamu')->result();
        return $query;
    }
}