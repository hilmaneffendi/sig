<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tentang_kami_admin extends CI_Controller {
     public function __construct(){
        parent::__construct();
        $this->load->model('Model_tentang_kami');
    }
    public function index(){
        $query              = $this->db->get_where('t_about',array('id'=>1));
        $rowx               = $query->row();
        $data['id']         = $rowx->id;
        $data['nama']       = $rowx->nama;
        $data['judul']      = $rowx->judul;
        $data['deskripsi']  = $rowx->deskripsi;       
        $data['email']      = $rowx->email;
        $data['telepon']    = $rowx->telepon;
        $data['foto']       = $rowx->foto;      
        $data['page'] = "tentang_kami_admin";
        $data['menu'] = "Tentang Kami";
        $data['icon'] = "icon-user";
        $data['content'] = "tentang_kami";
        $this->load->view('dashboard/view_dashboard',$data);
    }
    public function update_data(){
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
                    'email'         => $this->input->post('email'),
                    'telepon'       => $this->input->post('telepon'),
                    'deskripsi'     => $this->input->post('deskripsi')
                );
               $where = array(
                    'id' =>$this->input->post('id'),
                );
               $res = $this->Model_tentang_kami->Update('t_about',$data,$where);
               if ($res > 0) {
                    redirect('tentang_kami_admin','refresh');
               }
        }else{
            if ($this->upload->do_upload('foto')){
                $gbr = $this->upload->data();
                $data = array(
                    'nama'          => $this->input->post('nama'),
                    'email'         => $this->input->post('email'),
                    'telepon'       => $this->input->post('telepon'),
                    'deskripsi'     => $this->input->post('deskripsi'),
                    'foto'          => $gbr['file_name']
                );
               $where = array(
                    'id' =>$this->input->post('id'),
                );
               $res = $this->Model_tentang_kami->Update('t_about',$data,$where);
               if ($res > 0) {
                    redirect('tentang_kami_admin','refresh');
               }
            }else{
                redirect('tentang_kami_admin');
            }
        }
    }
}
