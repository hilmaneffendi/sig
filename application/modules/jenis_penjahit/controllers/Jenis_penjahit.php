<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jenis_penjahit extends CI_Controller {
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
        $this->load->model('MOdel_jenis_penjahit');
    }
    public function index(){
        $data['page'] = "jenis_penjahit";
        $data['menu'] = "Jenis Penjahit";
        $data['icon'] = "glyphicon glyphicon-book";
        $data['content'] = "content_jenis_penjahit";
        $data['data_pengguna'] = $this->MOdel_jenis_penjahit->getData();
        $this->load->view('dashboard/view_dashboard',$data);
    }
    public function hapus($id){
        $id = array('id' => $id);
        $this->MOdel_jenis_penjahit->Delete('t_jenis_penjahit', $id);
        redirect('jenis_penjahit','refresh');
    }
    public function form_add(){
        $data['page'] = "jenis_penjahit";
        $data['menu'] = "Jenis Penjahit";
        $data['icon'] = "glyphicon glyphicon-book";
        $data['content'] = "form_add";
        $data['data_pengguna'] = $this->MOdel_jenis_penjahit->getData();
        $this->load->view('dashboard/view_dashboard',$data);
    }
    public function proses_add(){
         $nama_foto = "foto_".time(); 
        $config['upload_path'] = './assets/foto/'; 
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['file_name'] = $nama_foto;
        $this->upload->initialize($config);
        if($_FILES['foto']['name']){
            if ($this->upload->do_upload('foto')){
                $gbr = $this->upload->data();
                $data = array(
                    'nama'      => $this->input->post('nama'),
                    'foto'      => $gbr['file_name']
                    );
                $data = $this->MOdel_jenis_penjahit->Insert('t_jenis_penjahit',$data);
                redirect('jenis_penjahit','refresh');
            }else{
                echo "<script>alert('Upload foto gagal : Cek Foto!');history.go(-1);</script>";
            }
        }
    }
    public function update_data(){
        $nama_foto                  = "foto_".time(); 
        $config['upload_path']      = './assets/foto/'; 
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
        $config['file_name']        = $nama_foto;
        $this->upload->initialize($config);
        if (empty($_FILES['foto']['name'])){
                $data = array(
                    'nama'          => $this->input->post('nama')
                );
               $where = array(
                    'id' =>$this->input->post('id'),
                );
               $res = $this->MOdel_jenis_penjahit->Update('t_jenis_penjahit',$data,$where);
               if ($res > 0) {
                    redirect('jenis_penjahit','refresh');
               }
        }else{
            if ($this->upload->do_upload('foto')){
                $gbr = $this->upload->data();
                $data = array(
                    'nama'          => $this->input->post('nama'),
                    'foto'          => $gbr['file_name']
                );
               $where = array(
                    'id' =>$this->input->post('id'),
                );
               $res = $this->MOdel_jenis_penjahit->Update('t_jenis_penjahit',$data,$where);
               if ($res > 0) {
                    redirect('jenis_penjahit','refresh');
               }
            }else{
               echo "<script>alert('Upload foto gagal : Cek Foto!');history.go(-1);</script>";
            }
        }
    }
    public function edit($id){
        $data['page']       = "jenis_penjahit";
        $data['menu']       = "Jenis Penjahit";
        $data['icon']       = "glyphicon glyphicon-book";
        $data['content']    = "form_edit";
        $query              = $this->db->get_where('t_jenis_penjahit',array('id'=>$id));
        $rowx               = $query->row();
        $data['id']         = $rowx->id;
        $data['foto']       = $rowx->foto;      
        $data['nama']       = $rowx->nama;
        $this->load->view('dashboard/view_dashboard',$data);
    }
}
