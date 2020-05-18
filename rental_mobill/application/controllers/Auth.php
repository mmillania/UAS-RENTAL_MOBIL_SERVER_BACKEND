<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_admin/header');
            $this->load->view('Form_login');
            $this->load->view('templates_admin/footer');
        }else{
            $username    = $this->input->post('username');
            $password    = md5($this->input->post('password'));

            $cek = $this->Rental_model->cek_login($username, $password);

            if ($cek == FAlSE) {
                $this->session->set_flashdata('pesan' ,'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password salah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                    redirect ('Auth/login');
                
            }else{
                $this->session->set_userdata('username',$cek->username);
                $this->session->set_userdata('role_id',$cek->role_id);
                $this->session->set_userdata('id_customer',$cek->id_customer);
                $this->session->set_userdata('nama',$cek->nama);
                

                switch ($cek->role_id) {
                    case 1 : redirect('Admin/Data_mobil');
                        break;
                    case 2 : redirect('Customer/Dashboard');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function logoutadmin()
    {
        $this->session->sess_destroy();
        redirect('Auth/login');
        
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Customer/Dashboard');
        
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username','Username', 'required');
        $this->form_validation->set_rules('password','Password', 'required');
    }

}

/* End of file Auth.php */

?>