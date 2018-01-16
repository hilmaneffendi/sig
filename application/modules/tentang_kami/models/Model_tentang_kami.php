<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_tentang_kami extends CI_Model {
    
    function getData(){
        $query = $this->db->get('t_about')->result();
        return $query;
    }
}