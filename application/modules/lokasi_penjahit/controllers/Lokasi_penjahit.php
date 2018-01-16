<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lokasi_penjahit extends CI_Controller {
     public function __construct(){
        parent::__construct();
        $this->load->model('Model_lokasi_penjahit');
    }
    public function index(){
        $config['center'] = '-7.359738,108.162712';
        $config['zoom'] = "auto";
        $this->googlemaps->initialize($config);
        $coords = $this->Model_lokasi_penjahit->GetLokasi();
        foreach ($coords as $coordinate) {
            $marker = array();
            $marker['animation']            = 'DROP';
            $marker['infowindow_content']='<div class=\"col-lg-2\"><div class=\"thumbnail no-padding\"><div class=\"thumb\"><img src=\"'.base_url().'assets/foto/'.$coordinate->foto.'\" alt=\"\"><div class=\"caption-overflow\"><span><a href=\"'.base_url().'assets/foto/'.$coordinate->foto.'\" class=\"btn bg-success-400 btn-icon btn-xs\" data-popup=\"lightbox\"><i class=\"icon-plus2\"></i></a></span></div></div></div></div><div class=\"col-lg-9\"><h6 class=\"text-semibold no-margin\"><a href=\"'.base_url().'lokasi_penjahit/detail_penjahit/'.$coordinate->id.'\">'.$coordinate->nama.'</a><small class=\"display-block\">'.$coordinate->alamat.'</small></h6></div>';

            $marker['icon']                 = base_url().'assets/foto/'.$coordinate->icon_marker;                            
            $marker['position']             = $coordinate->latitude.','.$coordinate->longitude;
            $this->googlemaps->add_marker($marker);
        }
        $data = array();
        $data['map'] = $this->googlemaps->create_map();
        $data['page'] = "lokasi_penjahit";
        $data['menu'] = "Lokasi Penjahit";
        $data['icon'] = "glyphicon glyphicon-map-marker";
        $data['content'] = "content_lokasi";
        $this->load->view('branda/view_branda',$data);
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
        $data['page']               = "lokasi_penjahit";
        $data['menu']               = "Lokasi Penjahit";
        $data['icon']               = "glyphicon glyphicon-map-marker";
        $data['content']            = "detail_penjahit";
        $this->load->view('branda/view_branda',$data);
    }
}
