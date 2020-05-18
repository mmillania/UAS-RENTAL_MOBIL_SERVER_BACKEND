<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_mobil extends CI_Controller {

    public function index()
        
    {  
        $data['mobil'] = $this->Rental_model->get_data('mobil')->result();
        $this->load->view('templates_customer/header');
        $this->load->view('Customer/Data_mobil', $data);
        $this->load->view('templates_customer/footer');

    }
    public function detail_mobil($id)
        
    {  
        $data['detail'] = $this->Rental_model->ambil_id_mobil($id);
        $this->load->view('templates_customer/header');
        $this->load->view('Customer/Detail_mobil', $data);
        $this->load->view('templates_customer/footer');

    }

    public function rental_mobil()
        
    {  
        $data['id_mobil'] = $_GET['id_mobil'];
        $this->load->view('templates_customer/header');
        $this->load->view('Customer/Form_rental_mobil', $data);
        $this->load->view('templates_customer/footer');

    }

    public function berhasil_form()
        
    {  
        $this->load->view('templates_customer/header');
        $this->load->view('Customer/Form_rental');
        $this->load->view('templates_customer/footer');

    }

    public function tambah_rental_aksi(){
        $this->_rules(); //form validation

        if($this->form_validation->run() == FALSE){
            $this->rental_mobil();
        }else{
            $id_mobil = $this->input->POST('id_mobil');
            $nama = $this->input->POST('nama');
            $noiden = $this->input->POST('noiden');
            $notelp = $this->input->POST('notelp');
            $tgl_rental = $this->input->POST('tgl_rental');
            $tgl_kembali = $this->input->POST('tgl_kembali');
            
        }

            $data = array(
                'id_mobil' => $id_mobil,
                'nama' => $nama,
                'noiden' => $noiden,
                'notelp' => $notelp,
                'tgl_rental' => $tgl_rental,
                'tgl_kembali' => $tgl_kembali,
            );

            //data masuk ke table mobil

            $this->Rental_model->insert_data($data, 'rental');
            $this->session->set_flashdata('pesan' ,'<div class="alert alert-success alert-dismissible fade show" role="alert">
            Formulir Berhasil Dikirim!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect ('Customer/Data_mobil/berhasil_form');
        }

        public function _rules(){
            $this->form_validation->set_rules('noiden', 'No Identitas', 'required');
            $this->form_validation->set_rules('notelp', 'No Telpon', 'required');
            $this->form_validation->set_rules('tgl_rental', 'Tanggal Rental', 'required');
            $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');
        }
    
}

/* End of file Data_mobil.php */

?>
