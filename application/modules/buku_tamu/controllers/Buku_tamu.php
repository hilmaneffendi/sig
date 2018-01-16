<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Buku_tamu extends CI_Controller {
	 public function __construct(){
	 	date_default_timezone_set('Asia/Jakarta');
        parent::__construct();
    }
	public function index(){
		$data['page'] = "buku_tamu";
		$data['menu'] = "Buku Tamu";
		$data['icon'] = "glyphicon glyphicon-book";
		$data['content'] = "content_buku_tamu";
		$this->load->model('Model_buku_tamu');
		$data['buku_tamu'] = $this->Model_buku_tamu->getBukuTamu();
		$this->load->view('branda/view_branda',$data);
	}
	public function process_input(){
		$data = array(
				'tanggal' 	=> date('Y-m-d'),
				'jam'		=> date('H:i:s'),
				'nama'		=> $this->input->post('nama'),
				'email'		=> $this->input->post('email'),
				'pesan'		=> $this->input->post('pesan'));
		$this->db->insert('t_tamu',$data);
		redirect('buku_tamu','refresh');
	}
}
