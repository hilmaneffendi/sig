<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jenis_mesin extends CI_Controller {
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
        $this->load->model('Model_jenis_mesin');
    }
    public function index(){
        $data['page'] = "jenis_mesin";
        $data['menu'] = "Jenis Mesin";
        $data['icon'] = "glyphicon glyphicon-book";
        $data['content'] = "content_jenis_mesin";
        $data['data_pengguna'] = $this->Model_jenis_mesin->getData();
        $this->load->view('dashboard/view_dashboard',$data);
    }
    public function hapus($id){
        $id = array('id' => $id);
        $this->Model_jenis_mesin->Delete('t_jenis_mesin', $id);
        redirect('jenis_mesin','refresh');
    }
    public function form_add(){
        $data['page'] = "jenis_mesin";
        $data['menu'] = "Jenis Mesin";
        $data['icon'] = "glyphicon glyphicon-book";
        $data['content'] = "form_add";
        $data['data_pengguna'] = $this->Model_jenis_mesin->getData();
        $this->load->view('dashboard/view_dashboard',$data);
    }
    public function proses_add(){
        $data = array(
            'nama'      => $this->input->post('nama')
            );
        $data = $this->Model_jenis_mesin->Insert('t_jenis_mesin',$data);
        redirect('jenis_mesin','refresh');
    }
    public function update_data(){
        $data = array(
                    'nama'          => $this->input->post('nama')
                );
               $where = array(
                    'id' =>$this->input->post('id'),
                );
               $res = $this->Model_jenis_mesin->Update('t_jenis_mesin',$data,$where);
               if ($res > 0) {
                    redirect('jenis_mesin','refresh');
               }
    }
    public function edit($id){
        $data['page']       = "jenis_mesin";
        $data['menu']       = "Jenis Mesin";
        $data['icon']       = "glyphicon glyphicon-book";
        $data['content']    = "form_edit";
        $query              = $this->db->get_where('t_jenis_mesin',array('id'=>$id));
        $rowx               = $query->row();
        $data['id']         = $rowx->id; 
        $data['nama']       = $rowx->nama;
        $this->load->view('dashboard/view_dashboard',$data);
    }
}
