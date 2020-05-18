<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_customer extends CI_Controller {

    public function index()
    {
    
        $data['customer'] = $this->Rental_model->get_data('customer')->result();

       $this->load->view('templates_admin/header');
       $this->load->view('templates_admin/sidebar');
       $this->load->view('Admin/Data_customer', $data);
       $this->load->view('templates_admin/footer');

    }

    public function tambah_customer()
    {
       $this->load->view('templates_admin/header');
       $this->load->view('templates_admin/sidebar');
       $this->load->view('Admin/Form_tambah_customer');
       $this->load->view('templates_admin/footer');

    }

    public function tambah_customer_aksi()
    {
       $this->_rules();

       if ($this->form_validation->run() == FALSE) {
           $this->tambah_customer();
       }else {
           $nama        = $this->input->post('nama');
           $username    = $this->input->post('username');
           $alamat      = $this->input->post('alamat');
           $gender      = $this->input->post('gender');
           $no_tlp      = $this->input->post('no_tlp');
           $no_ktp      = $this->input->post('no_ktp');
           $password    = md5($this->input->post('password'));

           $data = array (
               'nama'       => $nama,
               'username'   => $username,
               'alamat'     => $alamat,
               'gender'     => $gender,
               'no_tlp'     => $no_tlp,
               'no_ktp'     => $no_ktp,
               'password'   => $password
           );

           $this->Rental_model->insert_data($data, 'customer');
           $this->session->set_flashdata('pesan' ,'<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Customer Berhasil Ditambahkan!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect ('Admin/Data_customer');
       }

    }

    public function update_customer($id){
        $where = array ('id_customer' => $id);
        $data['customer'] = $this->db->query("SELECT * FROM customer WHERE id_customer = '$id'")->result();
       $this->load->view('templates_admin/header');
       $this->load->view('templates_admin/sidebar');
       $this->load->view('Admin/Form_update_customer', $data);
       $this->load->view('templates_admin/footer');
    }

    public function update_customer_aksi(){
        $this->_rules();

       if ($this->form_validation->run() == FALSE) {
           $this->update_customer();
       }else{
            $id          = $this->input->POST('id_customer');
            $nama        = $this->input->post('nama');
            $username    = $this->input->post('username');
            $alamat      = $this->input->post('alamat');
            $gender      = $this->input->post('gender');
            $no_tlp      = $this->input->post('no_tlp');
            $no_ktp      = $this->input->post('no_ktp');
            $password    = md5($this->input->post('password'));

            $data = array(
                'nama'       => $nama,
                'username'   => $username,
                'alamat'     => $alamat,
                'gender'     => $gender,
                'no_tlp'     => $no_tlp,
                'no_ktp'     => $no_ktp,
                'password'   => $password
            );
            $where = array(
                'id_customer' => $id
            );

            $this->Rental_model->update_data('customer', $data, $where);
            $this->session->set_flashdata('pesan' ,'<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Customer Berhasil Diperbaharui!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect ('Admin/Data_customer');
        }
    }

    public function delete_customer($id){
        $where = array('id_customer' => $id);
        $this->Rental_model->delete_data($where,'customer');
                $this->session->set_flashdata('pesan' ,'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Customer Berhasil Dihapus.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect ('Admin/Data_customer');
        }

    public function _rules()
    {
        $this->form_validation->set_rules('nama','Nama', 'required');
        $this->form_validation->set_rules('username','Username', 'required');
        $this->form_validation->set_rules('alamat','Alamat', 'required');
        $this->form_validation->set_rules('gender','Gender', 'required');
        $this->form_validation->set_rules('no_tlp','No Telpon', 'required');
        $this->form_validation->set_rules('no_ktp','No KTP', 'required');
        $this->form_validation->set_rules('password','Password', 'required');
    }


}

/* End of file Data_customer.php */

?>