<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function index()
    {
        $cus = $this->session->userdata('id_customer');
        $data['transaksi'] = $this->db->query("select * from transaksi tr, mobil mb, customer cs 
        where tr.id_mobil = mb.id_mobil and tr.id_customer = cs.id_customer 
        and cs.id_customer='$cus' order by id_rental desc")->result();

        $this->load->view('templates_customer/header');
        $this->load->view('Customer/Transaksi', $data);
        $this->load->view('templates_customer/footer');
    }

    public function pembayaran($id)
    {
        $data['transaksi'] = $this->db->query("select * from transaksi tr, mobil mb, customer cs 
        where tr.id_mobil = mb.id_mobil and tr.id_customer = cs.id_customer 
        and tr.id_rental='$id' order by id_rental desc")->result();

        $this->load->view('templates_customer/header');
        $this->load->view('Customer/Pembayaran', $data);
        $this->load->view('templates_customer/footer');
    }

    public function pembayaran_aksi(){
        $id = $this->input->post('id_rental');
        $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];
        if ($bukti_pembayaran){
            $config ['upload_path'] = './assets/upload';
            $config ['allowed_types'] = 'pdf|jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
                
            if($this->upload->do_upload('bukti_pembayaran')){
                $bukti_pembayaran=$this->upload->data('file_name');
                $this->db->set('bukti_pembayaran', $bukti_pembayaran);
            }else{
                echo $this->upload->display_errors();
            }
        }
        $data = array(
            'bukti_pembayaran' => $bukti_pembayaran,
        );
        $where = array(
            'id_rental' => $id
        );
        $this->Rental_model->update_data('transaksi', $data, $where);
        $this->session->set_flashdata('pesan' ,'<div class="alert alert-success alert-dismissible fade show" role="alert">
            Bukti Pembayaran Berhasil Di Upload!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect ('Customer/Transaksi');


    }

    public function cetak_invoice($id){
        $data['transaksi'] = $this->db->query("select * from transaksi tr, mobil mb, customer cs 
        where tr.id_mobil = mb.id_mobil and tr.id_customer = cs.id_customer 
        and tr.id_rental='$id'")->result();

        $this->load->view('Customer/Cetak_invoice',$data);
    }

}

/* End of file Transaksi.php */

?>