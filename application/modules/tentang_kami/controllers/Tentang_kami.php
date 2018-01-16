<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang_kami extends CI_Controller {
	 public function __construct(){
	 	date_default_timezone_set('Asia/Jakarta');
        parent::__construct();
        $this->load->model('Model_tentang_kami');
    }
	public function index(){
	
		$data['page'] = "tentang_kami";
		$data['menu'] = "Tentang Kami";
		$data['icon'] = "icon-user";
		$data['content'] = "content_tentang_kami";


		$data['about'] = $this->Model_tentang_kami->getData();

		$this->load->view('branda/view_branda',$data);
	}
}

