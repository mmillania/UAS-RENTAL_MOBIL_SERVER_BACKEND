<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_mobil extends CI_Controller {

    public function index()
    {
    
        $data['mobil'] = $this->Rental_model->get_data('mobil')->result();
        $data['type'] = $this->Rental_model->get_data('type')->result();
        
       $this->load->view('templates_admin/header');
       $this->load->view('templates_admin/sidebar');
       $this->load->view('Admin/Data_mobil', $data);
       $this->load->view('templates_admin/footer');

    }

    public function tambah_mobil(){
        $data['type'] = $this->Rental_model->get_data('type')->result();
       $this->load->view('templates_admin/header');
       $this->load->view('templates_admin/sidebar');
       $this->load->view('Admin/Form_tambah_mobil', $data);
       $this->load->view('templates_admin/footer');
    }

    public function tambah_mobil_aksi(){
        $this->_rules(); //form validation

        if($this->form_validation->run() == FALSE){
            $this->tambah_mobil();
        }else{
            $kode_type = $this->input->POST('kode_type');
            $merk = $this->input->POST('merk');
            $nopol = $this->input->POST('nopol');
            $warna = $this->input->POST('warna');
            $tahun = $this->input->POST('tahun');
            $harga = $this->input->POST('harga');
            $status= $this->input->POST('status');
            $denda = $this->input->POST('denda');
            $ac    = $this->input->POST('ac');
            $mp3_player = $this->input->POST('mp3_player');
            $central_lock = $this->input->POST('central_lock');
            $supir = $this->input->POST('supir');
            
            //konfigurasi untuk gambar
            $gambar = $_FILES['gambar']['name'];
            if ($gambar=''){}else{
            $config ['upload_path'] = './assets/upload';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                echo "Gambar Gagal Diupload! (Format Gambar:jpg/jpeg/png/gif)";
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }

            $data = array(
                'kode_type' => $kode_type,
                'merk' => $merk,
                'nopol' => $nopol,
                'tahun' => $tahun,
                'harga' => $harga,
                'warna' => $warna,
                'status' => $status,
                'denda' => $denda,
                'ac' => $ac,
                'supir' => $supir,
                'mp3_player' => $mp3_player,
                'central_lock' => $central_lock,
                'gambar' => $gambar
            );

            //data masuk ke table mobil

            $this->Rental_model->insert_data($data, 'mobil');
            $this->session->set_flashdata('pesan' ,'<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Mobil Berhasil Ditambahkan!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect ('Admin/Data_mobil');
        }
    }

    public function update_mobil($id){
        $where = array ('id_mobil' => $id);
        $data['mobil'] = $this->db->query("SELECT * FROM mobil mbl, type tp WHERE mbl.kode_type = 
        tp.kode_type AND mbl.id_mobil = '$id'")->result();

        $data['type'] = $this->Rental_model->get_data('type')->result();
       $this->load->view('templates_admin/header');
       $this->load->view('templates_admin/sidebar');
       $this->load->view('Admin/Form_update_mobil', $data);
       $this->load->view('templates_admin/footer');
    }

    public function update_mobil_aksi(){
        $this->_rules();

        if (!$this->form_validation->run() == FALSE){
            $this->update_mobil();

        }else{
            $id = $this->input->POST('id_mobil');
            $kode_type = $this->input->POST('kode_type');
            $merk = $this->input->POST('merk');
            $nopol = $this->input->POST('nopol');
            $warna = $this->input->POST('warna');
            $tahun = $this->input->POST('tahun');
            $harga = $this->input->POST('harga');
            $status = $this->input->POST('status');
            $denda = $this->input->POST('denda');
            $ac    = $this->input->POST('ac');
            $mp3_player = $this->input->POST('mp3_player');
            $central_lock = $this->input->POST('central_lock');
            $supir = $this->input->POST('supir');
            
            //konfigurasi untuk gambar
            $gambar = $_FILES['gambar']['name'];
            if ($gambar){
                $config ['upload_path'] = './assets/upload';
                $config ['allowed_types'] = 'jpg|jpeg|png|gif';

                 $this->load->library('upload', $config);
                if($this->upload->do_upload('gambar')){
                $gambar=$this->upload->data('file_name');
                $this->db->set('gambar', $gambar);
                }else{
                echo $this->upload->display_errors();
                }
            }

            $data = array(
                'kode_type' => $kode_type,
                'merk' => $merk,
                'nopol' => $nopol,
                'tahun' => $tahun,
                'harga' => $harga,
                'warna' => $warna,
                'denda' => $denda,
                'ac' => $ac,
                'supir' => $supir,
                'mp3_player' => $mp3_player,
                'central_lock' => $central_lock,
                'status' => $status
                
            );
            $where = array(
                'id_mobil' => $id
            );

            $this->Rental_model->update_data('mobil', $data, $where);
            $this->session->set_flashdata('pesan' ,'<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Mobil Berhasil Diperbaharui!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect ('Admin/Data_mobil');
        }
    }

    

    public function _rules(){
        $this->form_validation->set_rules('kode_type', 'Kode Type', 'required');
        $this->form_validation->set_rules('merk', 'Merk Mobil', 'required');
        $this->form_validation->set_rules('nopol', 'Nomor Kendaraan', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun Kendaraan', 'required');
        $this->form_validation->set_rules('harga', 'Harga Sewa Kendaraan', 'required');
        $this->form_validation->set_rules('warna', 'Warna Kendaraan', 'required');
        $this->form_validation->set_rules('status', 'Status Kendaraan', 'required');
        $this->form_validation->set_rules('denda', 'Denda Kendaraan', 'required');
        $this->form_validation->set_rules('ac', 'Fasilitas AC', 'required');
        $this->form_validation->set_rules('supir', 'Fasilitas Supir', 'required');
        $this->form_validation->set_rules('mp3_player', 'Fasilitas MP3 Player', 'required');
        $this->form_validation->set_rules('central_lock', 'Fasilitas Central Lock', 'required');
    }

    public function detail_mobil($id){
        $data['detail'] = $this->Rental_model->ambil_id_mobil($id);

        $data['type'] = $this->Rental_model->get_data('type')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('Admin/Detail_mobil', $data);
        $this->load->view('templates_admin/footer');

    }

    public function delete_mobil($id){
    $where = array('id_mobil' => $id);
    $this->Rental_model->delete_data($where,'mobil');
            $this->session->set_flashdata('pesan' ,'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Mobil Berhasil Dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect ('Admin/Data_mobil');
    }

    

}

/* End of file Data_mobil.php */

?>
