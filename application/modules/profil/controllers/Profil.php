<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	 public function __construct(){
        parent::__construct();
        $this->load->model('Model_profil');
    }
	public function index(){

        $query              = $this->db->get_where('t_member',array('user_id'=>$this->session->userdata('user_id')));
        $rowx               = $query->row();
        $data['foto']       = $rowx->foto;		
        $data['nama']       = $rowx->nama;
        $data['username']   = $rowx->username;
        $data['id']         = $rowx->id;
        $data['level']      = $rowx->level;



		$data['page'] = "profil";
		$data['menu'] = "Profil";
		$data['icon'] = "glyphicon glyphicon-map-marker";
		$data['content'] = "content_profil";
		$this->load->view('dashboard/view_dashboard',$data);
	}
    public function lokasi(){
        $query = $this->db->get_where('t_penjahit',array('user_id'=>$this->session->userdata('user_id')));
        $rowx = $query->row();
        $data['id']         = $rowx->id;
        $data['nama']       = $rowx->nama;
        $data['alamat']     = $rowx->alamat; 
        $data['latitude']   = $rowx->latitude;
        $data['longitude']  = $rowx->longitude;
        $data['foto']       = $rowx->foto;      



        $data['page'] = "lokasi";
        $data['menu'] = "Lokasi";
        $data['icon'] = "glyphicon glyphicon-map-marker";
        $data['content'] = "form_edit";
        $this->load->view('dashboard/view_dashboard',$data);
        
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
                        'status'   =>1,
                        'username'      => $this->input->post('username')
                    );
                   $where = array(
                        'id' =>$this->input->post('id'),
                    );
                   $res = $this->Model_profil->Update('t_member',$data,$where);
                   if ($res > 0) {
                        redirect('profil','refresh');
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
                   $res = $this->Model_profil->Update('t_member',$data,$where);
                   if ($res > 0) {
                        redirect('profil','refresh');
                   }
                }else{
                    redirect('profil');
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
                   $res = $this->Model_profil->Update('t_member',$data,$where);
                   if ($res > 0) {
                        redirect('profil','refresh');
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
                   $res = $this->Model_profil->Update('t_member',$data,$where);
                   if ($res > 0) {
                        redirect('profil','refresh');
                   }
                }else{
                   echo "<script>alert('Upload foto gagal : Cek Foto!');history.go(-1);</script>";
                }
            }

        }
    }
}
