<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Rental extends CI_Controller {

    public function tambah_rental($id)
    {
        $data['detail'] = $this->Rental_model->ambil_id_mobil($id);
        $this->load->view('templates_customer/header');
        $this->load->view('Customer/Tambah_rental', $data);
        $this->load->view('templates_customer/footer');
    }

    public function tambah_rental_aksi()
    {
        $id_mobil    = $this->input->post('id_mobil');
        $tgl_rental  = $this->input->post('tgl_rental');
        $tgl_kembali = $this->input->post('tgl_kembali');
        $denda       = $this->input->post('denda');
        $harga       = $this->input->post('harga');

        $data= array(
            'id_customer' => $this->session->userdata('id_customer'),
            'id_mobil'    => $id_mobil,
            'tgl_rental'  => $tgl_rental,
            'tgl_kembali' => $tgl_kembali,
            'denda'       => $denda,
            'harga'       => $harga,
            'tgl_pengembalian'    => '-',
            'status_rental'       => 'Belum Selesai',
            'status_pengembalian' => 'Belum Kembali',
        );

        $this->Rental_model->insert_data($data,'transaksi');

        $status = array(
          'status' => '0'
        );
        $id = array(
          'id_mobil' => $id_mobil
        );

        $this->Rental_model->update_data('mobil', $status, $id);
        $this->session->set_flashdata('pesan' ,'<div class="alert alert-success alert-dismissible fade show" role="alert">
            Transaksi Berhasil, Silahkan Checkout!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect ('Customer/Data_mobil');
    }

}

/* End of file Rental.php */

?>