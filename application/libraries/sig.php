<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sig{
   protected $CI;
   function __construct(){
      $this->CI =& get_instance();
   }
   function usaha(){
      $data = $this->CI->db->get('t_member');
      $row = $data->row();
      $newdata = array('nama_perusahaan'=>$row->nama_perusahaan); 
      $this->CI->session->set_userdata($newdata);
   }
}