<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lokasi_user extends CI_Controller {
	 public function __construct(){
        parent::__construct();
		if ($this->session->userdata('logged_in')!="Sudah Loggin") {
			redirect('login');
		}else{
			if($this->session->userdata('level')!="0"){
				redirect("dashboard","refresh");
			}
		}
		$this->load->helper('text');
        $this->load->model('Model_user');
    }
	public function index(){
		$data['page'] = "lokasi_user";
		$data['menu'] = "Lokasi User";
		$data['icon'] = "glyphicon glyphicon-map-marker";
		$data['content'] = "form_edit";
		$query = $this->db->get_where('t_penjahit',array('user_id'=>$this->session->userdata('user_id')));
		$rowx = $query->row();
		$data['id']						= $rowx->id;
	   	$data['nama']					= $rowx->nama;
	   	$data['alamat']					= $rowx->alamat;
	   	$data['foto']					= $rowx->foto;
	   	$data['latitude']				= $rowx->latitude;
	   	$data['longitude']				= $rowx->longitude;
	   	$data['user_id']				= $rowx->user_id;
	   	$data['jenis_penjahit_id']		= $rowx->jenis_penjahit_id;
	   	$data['jenis_mesin_id']			= $rowx->jenis_mesin_id;
	   	$data['info_harga']				= $rowx->info_harga;
	   	$data['lama_pengerjaan']		= $rowx->lama_pengerjaan;
	   	$data['jadwal_toko']			= $rowx->jadwal_toko;
	   	$data['status']					= $rowx->status_penjahit;
		$this->load->view('dashboard/view_dashboard',$data);
	}
	public function update_data(){
		$nama_foto 					= "foto_".time(); 
        $config['upload_path'] 		= './assets/foto/'; 
        $config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
        $config['file_name'] 		= $nama_foto;
        $this->upload->initialize($config);
        if (empty($_FILES['foto']['name'])){
                $data = array(
			   		'nama'						=> $this->input->post('nama'),
			   		'jenis_penjahit_id'			=> $this->input->post('jenis_penjahit'),
					'jenis_mesin_id'			=> $this->input->post('jenis_mesin'),
					'jadwal_toko'				=> $this->input->post('jadwal_toko'),
					'lama_pengerjaan'			=> $this->input->post('lama_pengerjaan'),
					'info_harga'				=> $this->input->post('info_harga'),
					'alamat'					=> $this->input->post('alamat'),
					'latitude'					=> $this->input->post('latitude'),
					'longitude'					=> $this->input->post('longitude'),
					'status_user'   			=> 1,
					'status_penjahit'			=> 1
			   	);
			   $where = array(
			   		'id' =>$this->input->post('id'),
			   	);
			   $res = $this->Model_user->Update('t_penjahit',$data,$where);
			   if ($res > 0) {
			   		redirect('lokasi_user','refresh');
			   }
        }else{
        	if ($this->upload->do_upload('foto')){
                $gbr = $this->upload->data();
                $data = array(
                	'nama'						=> $this->input->post('nama'),
			   		'jenis_penjahit_id'			=> $this->input->post('jenis_penjahit'),
					'jenis_mesin_id'			=> $this->input->post('jenis_mesin'),
					'jadwal_toko'				=> $this->input->post('jadwal_toko'),
					'lama_pengerjaan'			=> $this->input->post('lama_pengerjaan'),
					'info_harga'				=> $this->input->post('info_harga'),
					'alamat'					=> $this->input->post('alamat'),
					'latitude'					=> $this->input->post('latitude'),
					'longitude'					=> $this->input->post('longitude'),
					'foto' 						=> $gbr['file_name'],
					'status_user'   			=> 1,
					'status_penjahit'			=> 1
			   	);
			   $where = array(
			   		'id' =>$this->input->post('id'),
			   	);
			   $res = $this->Model_user->Update('t_penjahit',$data,$where);
			   if ($res > 0) {
			   		redirect('lokasi_user','refresh');
			   }
            }else{
            	echo "<script>alert('File yang di uplaod harus berformat gif|jpg|png|jpeg|bmp!');history.go(-1);</script>";
            }
        }
	}
	public function add_images(){
        $data['page'] = "lokasi_user";
		$data['menu'] = "Lokasi User";
		$data['icon'] = "glyphicon glyphicon-map-marker";
        $data['content'] = "form_add_images";
        $this->load->view('dashboard/view_dashboard',$data);
    }
    public function process_add_images(){
        $id                         = $this->input->post('penjahit_id');
        $nama_foto                  = "foto_".time(); 
        $config['upload_path']      = './assets/foto/'; 
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
        $config['file_name']        = $nama_foto;
        $this->upload->initialize($config);
        if($_FILES['foto']['name']){
            if ($this->upload->do_upload('foto')){  
                $gbr = $this->upload->data();
                $data = array(
                    'foto'          => $gbr['file_name'],
                    'penjahit_id'   => $id
                    );
                $data   = $this->Model_user->Insert('t_detail_foto',$data);
                redirect('lokasi_user/add_images/'.$id,'refresh');
            }else{
                 ?>
                    <script type="text/javascript">
                        alert('File yang di uplaod harus berformat gif|jpg|png|jpeg|bmp!'); 
                    </script>
               <?php
            }
        }
    }
    public function delete_images($id,$i){
        $data   = $this->db->get_where('t_detail_foto', array('id' => $id));
        $rows   = $data->row();
        $foto   = $rows->foto;
        unlink('assets/foto/'.$foto);
        $id     = array('id' => $id);
        $this->Model_user->Delete('t_detail_foto', $id);
        redirect('lokasi_user/add_images/'.$i,'refresh');
    }
}
