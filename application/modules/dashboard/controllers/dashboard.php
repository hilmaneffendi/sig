<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	public function index(){
		if ($this->session->userdata('logged_in')!="Sudah Loggin") {
			redirect('login');
		}else{
			if($this->session->userdata('level')!="1"){
				redirect("profil","refresh");
			}
		}
		$data['page'] = "dashboard";
		$data['menu'] = "Dashboard";
		$data['icon'] = "icon-home4";
		$data['content'] = "content_dashboard";
		$this->load->view('dashboard/view_dashboard',$data);
	}
	public function logout() {
		session_destroy();
		redirect('login');
	}
}
