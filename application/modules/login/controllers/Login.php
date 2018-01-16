<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('Model_login');
		if ($this->session->userdata('logged_in')=="Sudah Loggin") {
			redirect('dashboard');
		}
        
    }
	public function index(){
		$data['page'] = "data_penjahit";
		$data['menu'] = "Data Penjahit";
		$data['icon'] = "glyphicon glyphicon-map-marker";
		$data['content'] = "content_data";
		$this->load->view('view_login');
	}
	public function register(){
		$kd = $this->input->post('username');
		$cekdata = $this->db->get_where('t_member',array('username'=>$kd));
		if ($cekdata->num_rows() > 0) {
			?>
				<script type="text/javascript">
					var kode = '<?php echo $kd ?>';
					alert('Username '+kode+' telah digunakan!');
					window.location.href = 'login'; 
				</script>
			<?php
		}else{
			$username					= "USER_".time();
	        $nama_foto 					= "foto_".time(); 
	        $config['upload_path'] 		= './assets/foto/'; 
	        $config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
	        /*$config['max_size'] 		= '2048'; 
	        $config['max_width']  		= '1288'; 
	        $config['max_height']  		= '768';*/ 
	        $config['file_name'] 		= $nama_foto;
	        $this->upload->initialize($config);
	        if($_FILES['foto']['name']){
	            if ($this->upload->do_upload('foto')){
	                $gbr = $this->upload->data();
					$data = array(
						'nama'		=> $this->input->post('nama'),
						'username'	=> $this->input->post('username'),
						'password'	=> md5($this->input->post('password')),
						'user_id'	=> $username,
						'foto' 		=> $gbr['file_name']
						);
					$x	= array(
						'user_id'	=> $username
						);
					$data 	= $this->Model_login->Insert('t_member',$data);
					$u 		= $this->Model_login->Insert('t_penjahit',$x);
					?>
	               		<script type="text/javascript">
							alert('Registrasi berhasil, silahkan login!');
							window.location.href = 'login'; 
						</script>
	               <?php
					redirect('login','refresh');
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
	}
	public function cek_login() {
		$data = array('username' => $this->input->post('username', TRUE),
						'password' => md5($this->input->post('password', TRUE))
			);
		$hasil = $this->Model_login->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] 	= 'Sudah Loggin';
				$sess_data['id'] 			= $sess->id;
				$sess_data['nama'] 			= $sess->nama;
				$sess_data['username'] 		= $sess->username;
				$sess_data['password'] 		= $sess->password;
				$sess_data['foto'] 			= $sess->foto;
				$sess_data['level'] 		= $sess->level;
				$sess_data['user_id']		= $sess->user_id;
			}
			$this->session->set_userdata($sess_data);
			redirect('dashboard');
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}
}
