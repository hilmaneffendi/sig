<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_pengguna extends CI_Controller {
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
		$this->load->model('Model_data_pengguna');
    }
	public function index(){
		$data['page'] = "data_pengguna";
		$data['menu'] = "Data Pengguna";
		$data['icon'] = "glyphicon glyphicon-book";
		$data['content'] = "content_data_pengguna";
		$data['data_pengguna'] = $this->Model_data_pengguna->getData();
		$this->load->view('dashboard/view_dashboard',$data);
	}
	public function hapus($id){
		$id = array('id' => $id);
		$this->Model_data_pengguna->Delete('t_member', $id);
	    redirect('data_pengguna','refresh');
	}
	public function form_add(){
		$data['page'] = "data_pengguna";
		$data['menu'] = "Data Pengguna";
		$data['icon'] = "glyphicon glyphicon-book";
		$data['content'] = "form_add";
		$data['data_pengguna'] = $this->Model_data_pengguna->getData();
		$this->load->view('dashboard/view_dashboard',$data);
	}
	public function proses_add(){
		 $nama_foto = "foto_".time(); 
        $config['upload_path'] = './assets/foto/'; 
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        /*$config['max_size'] = '2048'; 
        $config['max_width']  = '1288'; 
        $config['max_height']  = '768'; */
        $config['file_name'] = $nama_foto;
 
        $this->upload->initialize($config);
         
        if($_FILES['foto']['name']){
            if ($this->upload->do_upload('foto')){
                $gbr = $this->upload->data();


				$data = array(
					'nama'		=> $this->input->post('nama'),
					'username'	=> $this->input->post('username'),
					'password'	=> md5($this->input->post('password')),
					'foto' 		=> $gbr['file_name'],
					'level' 	=> '1'
					);
				$data = $this->Model_data_pengguna->Insert('t_member',$data);
				redirect('data_pengguna','refresh');
            }else{
               $this->form_input();
            }
        }
	}
	public function update_data(){
        $pass   = $this->input->post('password');
        if (empty($_POST['password'])) {
            $nama_foto                  = "foto_".time(); 
            $config['upload_path']      = './assets/foto/'; 
            $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
           /* $config['max_size']         = '2048'; 
            $config['max_width']        = '1288'; 
            $config['max_height']       = '768'; */
            $config['file_name']        = $nama_foto;
     
            $this->upload->initialize($config);
            if (empty($_FILES['foto']['name'])){
              
                    $data = array(
                        'nama'          => $this->input->post('nama'),
                        'username'      => $this->input->post('username')
                    );
                   $where = array(
                        'id' =>$this->input->post('id'),
                    );
                   $res = $this->Model_data_pengguna->Update('t_member',$data,$where);
                   if ($res > 0) {
                        redirect('data_pengguna','refresh');
                   }
            }else{
                if ($this->upload->do_upload('foto')){
                    $gbr = $this->upload->data();
                    $data = array(
                        'nama'          => $this->input->post('nama'),
                        'username'      => $this->input->post('username'),
                        'foto'          => $gbr['file_name']
                    );
                   $where = array(
                        'id' =>$this->input->post('id'),
                    );
                   $res = $this->Model_data_pengguna->Update('t_member',$data,$where);
                   if ($res > 0) {
                        redirect('data_pengguna','refresh');
                   }
                }else{
                    redirect('data_pengguna');
                }
            }
        }else{
            $nama_foto                  = "foto_".time(); 
            $config['upload_path']      = './assets/foto/'; 
            $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
         /*   $config['max_size']         = '2048'; 
            $config['max_width']        = '1288'; 
            $config['max_height']       = '768'; */
            $config['file_name']        = $nama_foto;
     
            $this->upload->initialize($config);
            if (empty($_FILES['foto']['name'])){
              
                    $data = array(
                        'nama'          => $this->input->post('nama'),
                        'username'      => $this->input->post('username'),
                        'password'      => md5($this->input->post('password'))
                    );
                   $where = array(
                        'id' =>$this->input->post('id'),
                    );
                   $res = $this->Model_data_pengguna->Update('t_member',$data,$where);
                   if ($res > 0) {
                        redirect('data_pengguna','refresh');
                   }
            }else{
                if ($this->upload->do_upload('foto')){
                    $gbr = $this->upload->data();
                    $data = array(
                        'nama'          => $this->input->post('nama'),
                        'username'      => $this->input->post('username'),
                        'password'      => md5($this->input->post('password')),
                        'foto'          => $gbr['file_name']
                    );
                   $where = array(
                        'id' =>$this->input->post('id'),
                    );
                   $res = $this->Model_data_pengguna->Update('t_member',$data,$where);
                   if ($res > 0) {
                        redirect('data_pengguna','refresh');
                   }
                }else{
                   echo "<script>alert('Upload foto gagal : Cek Foto!');history.go(-1);</script>";
                }
            }

        }
    }
    public function edit($id){
        $data['page'] = "data_pengguna";
		$data['menu'] = "Data Pengguna";
		$data['icon'] = "glyphicon glyphicon-book";
		$data['content'] = "form_edit";

    	$query              = $this->db->get_where('t_member',array('id'=>$id));
        $rowx               = $query->row();
        $data['foto']       = $rowx->foto;		
        $data['nama']       = $rowx->nama;
        $data['username']   = $rowx->username;
        $data['id']         = $rowx->id;
        $data['level']      = $rowx->level;

		$this->load->view('dashboard/view_dashboard',$data);
    }
}
