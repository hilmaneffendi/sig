<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branda extends CI_Controller {
	public function index(){
		$data['page'] = "branda";
		$data['menu'] = "Branda";
		$data['icon'] = "icon-home4";
		$data['content'] = "content_branda";
		$this->load->view('view_branda',$data);
	}
}
