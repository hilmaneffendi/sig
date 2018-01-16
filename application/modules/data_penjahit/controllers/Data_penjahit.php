<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_penjahit extends CI_Controller {
     public function __construct(){
        parent::__construct();
        if ($this->session->userdata('logged_in')!="Sudah Loggin") {
            redirect('login');
        }else{
            if($this->session->userdata('level')!="1"){
                redirect("dashboard","refresh");
            }
        }
        $this->load->helper('text');
        $this->load->model('Model_data_penjahit');
    }
    public function index(){
        $data['page'] = "data_penjahit";
        $data['menu'] = "Data Penjahit";
        $data['icon'] = "glyphicon glyphicon-map-marker";
        $data['content'] = "content_data";
        $data['list_penjahit'] = $this->Model_data_penjahit->GetPenjahit('t_penjahit');
        $this->load->view('dashboard/view_dashboard',$data);
    }
    public function form_input(){
        $data['page'] = "data_penjahit";
        $data['menu'] = "Lokasi Penjahit";
        $data['icon'] = "glyphicon glyphicon-map-marker";
        $data['content'] = "form_input";
        $data['list_penjahit'] = $this->Model_data_penjahit->GetPenjahit('t_penjahit');
        $this->load->view('dashboard/view_dashboard',$data);    
    }
    public function insert_data(){
        $username                   = "USER_".time();
        $nama_foto                  = "foto_".time(); 
        $config['upload_path']      = './assets/foto/'; 
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
        $config['file_name']        = $nama_foto;
        $this->upload->initialize($config);
        if($_FILES['foto']['name']){
            if ($this->upload->do_upload('foto')){  
                $gbr = $this->upload->data();
                $data = array(
                    'nama'              => $this->input->post('nama'),
                    'jenis_penjahit_id' => $this->input->post('jenis_penjahit'),
                    'jenis_mesin_id'    => $this->input->post('jenis_mesin'),
                    'jadwal_toko'       => $this->input->post('jadwal_toko'),
                    'lama_pengerjaan'   => $this->input->post('lama_pengerjaan'),
                    'info_harga'        => $this->input->post('info_harga'),
                    'alamat'            => $this->input->post('alamat'),
                    'foto'              => $gbr['file_name'],
                    'status_penjahit'   => '1',
                    'latitude'          => $this->input->post('latitude'),
                    'longitude'         => $this->input->post('longitude'),
                    'user_id'           => $username
                    );
                $x  = array(
                        'user_id'   => $username
                        );
                $data   = $this->Model_data_penjahit->Insert('t_penjahit',$data);
                $u      = $this->Model_data_penjahit->Insert('t_member',$x);
                redirect('data_penjahit','refresh');
            }else{
                 ?>
                    <script type="text/javascript">
                        alert('File yang di uplaod harus berformat gif|jpg|png|jpeg|bmp!');
                        window.location.href = 'login'; 
                    </script>
               <?php
            }
        }
    }
    public function detail_penjahit($id){
        $query = $this->db->get_where('view_penjahit', array('id' => $id));
        $rows = $query->row();
        $nama               = $rows->nama;
        $alamat             = $rows->alamat;
        $foto               = $rows->foto;
        $latitude           = $rows->latitude;
        $longitude          = $rows->longitude;
        $config['center']   = $latitude.','.$longitude;
        $config['zoom']     = '18';
        $this->googlemaps->initialize($config);
        $marker = array();
        $marker['icon']                 = base_url().'assets/foto/'.$rows->icon_marker;
        $marker['animation']            = 'DROP';
        $marker['infowindow_content']   = $nama;                            
        $marker['position']             = $latitude.','.$longitude;
        $this->googlemaps->add_marker($marker);
        $data = array();
        $data['map']                = $this->googlemaps->create_map();
        $data['nama']               = $nama;
        $data['nama_jenis']         = $rows->nama_jenis;
        $data['nama_mesin']         = $rows->nama_mesin;
        $data['jadwal_toko']        = $rows->jadwal_toko;
        $data['lama_pengerjaan']    = $rows->lama_pengerjaan;
        $data['info_harga']         = $rows->info_harga;
        $data['alamat']             = $alamat;
        $data['foto']               = $foto;
        $data['latitude']           = $latitude;
        $data['longitude']          = $longitude;
        $data['page']               = "data_penjahit";
        $data['menu']               = "Data Penjahit";
        $data['icon']               = "glyphicon glyphicon-map-marker";
        $data['content']            = "content_detail";
        $this->load->view('dashboard/view_dashboard',$data);
    }
    public function edit_penjahit($id){
        $data['page']               = "data_penjahit";
        $data['menu']               = "Data Penjahit";
        $data['icon']               = "glyphicon glyphicon-map-marker";
        $data['content']            = "form_edit";
        $x = $this->Model_data_penjahit->GetWhere('view_penjahit', array('id' => $id));
        $data['id']                 = $x[0]['id'];
        $data['nama']               = $x[0]['nama'];
        $data['jenis_penjahit_id']  = $x[0]['jenis_penjahit_id'];
        $data['nama_jenis']         = $x[0]['nama_jenis'];
        $data['icon_marker']        = $x[0]['icon_marker'];
        $data['jenis_mesin_id']     = $x[0]['jenis_mesin_id'];
        $data['nama_mesin']         = $x[0]['nama_mesin'];
        $data['jadwal_toko']        = $x[0]['jadwal_toko'];
        $data['lama_pengerjaan']    = $x[0]['lama_pengerjaan'];
        $data['info_harga']         = $x[0]['info_harga'];
        $data['alamat']             = $x[0]['alamat'];
        $data['foto']               = $x[0]['foto'];
        $data['latitude']           = $x[0]['latitude'];
        $data['longitude']          = $x[0]['longitude'];
        $data['status']             = $x[0]['status_penjahit'];
        $this->load->view('dashboard/view_dashboard',$data);
    }
    public function update_data(){
        $nama_foto                  = "foto_".time(); 
        $config['upload_path']      = './assets/foto/'; 
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
        $config['file_name']        = $nama_foto;
        $this->upload->initialize($config);
        if (empty($_FILES['foto']['name'])){
                $data = array(
                    'nama'                  => $this->input->post('nama'),
                    'jenis_penjahit_id'     => $this->input->post('jenis_penjahit'),
                    'jenis_mesin_id'        => $this->input->post('jenis_mesin'),
                    'jadwal_toko'           => $this->input->post('jadwal_toko'),
                    'lama_pengerjaan'       => $this->input->post('lama_pengerjaan'),
                    'info_harga'            => $this->input->post('info_harga'),
                    'alamat'                => $this->input->post('alamat'),
                    'latitude'              => $this->input->post('latitude'),
                    'longitude'             => $this->input->post('longitude')
                );
               $where = array(
                    'id' =>$this->input->post('id'),
                );
               $res = $this->Model_data_penjahit->Update('t_penjahit',$data,$where);
               if ($res > 0) {
                    redirect('data_penjahit','refresh');
               }
        }else{
            if ($this->upload->do_upload('foto')){
                $gbr = $this->upload->data();
                $data = array(
                    'nama'                  => $this->input->post('nama'),
                    'alamat'                => $this->input->post('alamat'),
                    'foto'                  => $gbr['file_name'],
                    'jenis_penjahit_id'     => $this->input->post('jenis_penjahit'),
                    'jenis_mesin_id'        => $this->input->post('jenis_mesin'),
                    'jadwal_toko'           => $this->input->post('jadwal_toko'),
                    'lama_pengerjaan'       => $this->input->post('lama_pengerjaan'),
                    'info_harga'            => $this->input->post('info_harga'),
                    'latitude'              => $this->input->post('latitude'),
                    'longitude'             => $this->input->post('longitude')
                );
               $where = array(
                    'id' =>$this->input->post('id'),
                );
               $res = $this->Model_data_penjahit->Update('t_penjahit',$data,$where);
               if ($res > 0) {
                    redirect('data_penjahit','refresh');
               }
            }else{
                $this->edit_penjahit();
            }
        }
    }
    public function hapus_penjahit($user_id){
        $data = $this->db->get_where('t_penjahit', array('user_id' => $user_id));
        $rows = $data->row();
        $foto = $rows->foto;
        unlink('assets/foto/'.$foto);
        $user_id = array('user_id' => $user_id);
        $this->Model_data_penjahit->Delete('t_penjahit', $user_id);
        $this->Model_data_penjahit->Delete('t_member', $user_id);
        redirect('data_penjahit','refresh');
    }
    public function form_user($user_id){
        $data['page'] = "data_penjahit";
        $data['menu'] = "Lokasi Penjahit";
        $data['icon'] = "glyphicon glyphicon-map-marker";
        $data['content'] = "form_user";
        $query = $this->db->get_where('t_member', array('user_id' => $user_id));
        $rows = $query->row();
        $data['id']             = $rows->id;
        $data['nama']           = $rows->nama;
        $data['username']       = $rows->username;
        $data['password']       = $rows->password;
        $data['user_id']        = $rows->user_id;
        $data['level']          = $rows->level;
        $data['foto']           = $rows->foto;
        $data['status']         = $rows->status;
        $this->load->view('dashboard/view_dashboard',$data);    
    }
    public function update_data_user(){
        $kd = $this->input->post('username');
        $cekdata = $this->db->get_where('t_member',array('username'=>$kd));
        if ($cekdata->num_rows() > 0) {
            ?>
                <script type="text/javascript">
                    var kode = '<?php echo $kd ?>';
                    alert('Username '+kode+' telah digunakan!');
                    window.location.href = 'data_penjahit'; 
                </script>
            <?php
        }else{
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
                        'status'        => 1,
                        'username'      => $this->input->post('username')
                    );
                   $where = array(
                        'user_id' =>$this->input->post('user_id'),
                    );
                    $u = array(
                            'status_user' =>1
                        );
                    $res = $this->Model_data_penjahit->Update('t_penjahit',$u,$where);
                   $res = $this->Model_data_penjahit->Update('t_member',$data,$where);
                   if ($res > 0) {
                        redirect('data_penjahit','refresh');
                   }
            }else{
                if ($this->upload->do_upload('foto')){
                    $gbr = $this->upload->data();
                    $data = array(
                        'nama'          => $this->input->post('nama'),
                        'username'      => $this->input->post('username'),
                        'status'        => 1,
                        'foto'          => $gbr['file_name']
                    );
                   $where = array(
                        'user_id' =>$this->input->post('user_id'),
                    );
                   $u = array(
                            'status_user' =>1
                        );
                    $res = $this->Model_data_penjahit->Update('t_penjahit',$u,$where);
                   $res = $this->Model_data_penjahit->Update('t_member',$data,$where);
                   if ($res > 0) {
                        redirect('data_penjahit','refresh');
                   }
                }else{
                    redirect('data_penjahit');
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
                        'status'        => 1,
                        'password'      => md5($this->input->post('password'))
                    );
                   $where = array(
                        'user_id' =>$this->input->post('user_id'),
                    );
                   $u = array(
                            'status_user' =>1
                        );
                    $res = $this->Model_data_penjahit->Update('t_penjahit',$u,$where);
                   $res = $this->Model_data_penjahit->Update('t_member',$data,$where);
                   if ($res > 0) {
                        redirect('data_penjahit','refresh');
                   }
            }else{
                if ($this->upload->do_upload('foto')){
                    $gbr = $this->upload->data();
                    $data = array(
                        'nama'          => $this->input->post('nama'),
                        'username'      => $this->input->post('username'),
                        'status'        => 1,
                        'password'      => md5($this->input->post('password')),
                        'foto'          => $gbr['file_name']
                    );
                   $where = array(
                        'user_id' =>$this->input->post('user_id'),
                    );
                   $u = array(
                            'status_user' =>1
                        );
                    $res = $this->Model_data_penjahit->Update('t_penjahit',$u,$where);
                   $res = $this->Model_data_penjahit->Update('t_member',$data,$where);
                   if ($res > 0) {
                        redirect('data_penjahit','refresh');
                   }
                }else{
                   echo "<script>alert('Upload foto gagal : Cek Foto!');history.go(-1);</script>";
                }
            }
        }
        }
    }
    public function add_images(){
        $data['page'] = "data_penjahit";
        $data['menu'] = "Data Penjahit";
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
                $data   = $this->Model_data_penjahit->Insert('t_detail_foto',$data);
                redirect('data_penjahit/add_images/'.$id,'refresh');
            }else{
                 ?>
                    <script type="text/javascript">
                        alert('File yang di uplaod harus berformat gif|jpg|png|jpeg|bmp!');
                        window.location.href = 'login'; 
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
        $this->Model_data_penjahit->Delete('t_detail_foto', $id);
        redirect('data_penjahit/add_images/'.$i,'refresh');
    }
}
