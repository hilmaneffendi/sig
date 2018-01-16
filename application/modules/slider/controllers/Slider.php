<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {
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
		$this->load->model('Model_slider');
    }
	public function index(){
	
		$data['page'] = "slider";
		$data['menu'] = "Slider";
		$data['icon'] = "icon-image-comparek";
		$data['content'] = "content_slider";


		$data['slider'] = $this->Model_slider->getData();

		$this->load->view('dashboard/view_dashboard',$data);
	}
	public function hapus($id){
		$id = array('id' => $id);
		$this->Model_slider->Delete('t_tamu', $id);

	    redirect('slider','refresh');
	}
	public function edit_slider($id){
		$query = $this->db->get_where('t_slider', array('id' => $id));
        $rows = $query->row();
        
        $data['id']			= $rows->id;
        $data['judul']		= $rows->judul;
        $data['keterangan']	= $rows->keterangan;
        $data['foto']       = $rows->foto;
        
        $data['page'] = "slider";
		$data['menu'] = "Slider";
		$data['icon'] = "icon-image-comparek";
		$data['content'] = "form_edit";
		$this->load->view('dashboard/view_dashboard',$data);
	}
	public function update_data(){
		$x =$this->input->post('id');
		$nama_foto 					= "foto_".time(); 
        $config['upload_path'] 		= './assets/foto/'; 
        $config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
     /*   $config['max_size'] 		= '2048'; 
        $config['max_width']  		= '1288'; 
        $config['max_height']  		= '768'; */
        $config['file_name'] 		= $nama_foto;
 
        $this->upload->initialize($config);
        if (empty($_FILES['foto']['name'])){
          
                $data = array(
			   		'judul'		=> $this->input->post('judul'),
					'keterangan'	=> $this->input->post('keterangan')
			   	);
			   $where = array(
			   		'id' =>$this->input->post('id'),
			   	);
			   $res = $this->Model_slider->Update('t_slider',$data,$where);
			   if ($res > 0) {
			   		redirect('slider','refresh');
			   }
        }else{
        	if ($this->upload->do_upload('foto')){
                $gbr = $this->upload->data();
                $data = array(
                	'judul'			=> $this->input->post('judul'),
					'keterangan'	=> $this->input->post('keterangan'),
					'foto' 			=> $gbr['file_name']
			   	);
			   $where = array(
			   		'id' =>$this->input->post('id'),
			   	);
			   $res = $this->Model_slider->Update('t_slider',$data,$where);
			   if ($res > 0) {
			   		redirect('slider','refresh');
			   }
            }else{
               	redirect('slider/edit_slider/'.$x);
            }
        }
	}
}

