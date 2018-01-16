<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_tamu extends CI_Controller {
	 public function __construct(){
	 	date_default_timezone_set('Asia/Jakarta');
        parent::__construct();
		if ($this->session->userdata('logged_in')!="Sudah Loggin") {
			redirect('login');
		}else{
			if($this->session->userdata('level')!="1"){
				redirect("dashboard","refresh");
			}
		}
		$this->load->helper('text');
		$this->load->model('Model_data_tamu');
    }
	public function index(){
		$data['page'] = "data_tamu";
		$data['menu'] = "Data Tamu";
		$data['icon'] = "glyphicon glyphicon-book";
		$data['content'] = "content_data_tamu";
		$data['data_tamu'] = $this->Model_data_tamu->getDataTamu();
		$this->load->view('dashboard/view_dashboard',$data);
	}
	public function hapus($id){
		$id = array('id' => $id);
		$this->Model_data_tamu->Delete('t_tamu', $id);
	    redirect('data_tamu','refresh');
	}
}
