<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'libraries/REST_Controller.php';
require APPPATH .'libraries/Format.php';

class Data_Customer extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rental_model','customer');
    }

    public function index_get()
    {
        $id = $this->get('id_customer');
        if($id === null) {
            $customer = $this->customer->getCustomer();
        } else {
            $customer = $this->customer->getCustomer($id);
        }

            if($customer) {
                $this->response([
                    'status' => true,
                    'data' => $customer
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
    }

    public function index_delete(){
        $id=$this->delete('id_customer');

        if($id===null) {
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if ($this->customer->deleteCustomer($id) > 0){
                //ok
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted.'
                ], REST_Controller::HTTP_OK);
            }else{
                //id not found
                $this->response([
                    'status' =>false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post(){
        $data = [

            'nama'      => $this->post('nama'),
            'username'  => $this->post('username'),
            'alamat'    => $this->post('alamat'),
            'gender'    => $this->post('gender'),
            'no_tlp'    => $this->post('no_tlp'),
            'no_ktp'    => $this->post('no_ktp'),
            'password'  => md5($this->input->post('password')),
            'role_id'   => $this->post('role_id'),
            
        ];

        if($this->customer->createCustomer($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'new customer has been created'
            ], REST_Controller::HTTP_CREATED);
        }else{
            //id not found
            $this->response([
                'status' => false,
                'message' => 'failed to create new data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put(){
        $id = $this->put('id_customer');
        $data = [

            'nama'      => $this->put('nama'),
            'username'  => $this->put('username'),
            'alamat'    => $this->put('alamat'),
            'gender'    => $this->put('gender'),
            'no_tlp'    => $this->put('no_tlp'),
            'no_ktp'    => $this->put('no_ktp'),
            'password'  => md5($this->put('password')),
            'role_id'   => $this->put('role_id'),
           
        ];

        if($this->customer->updateCustomer($data, $id) > 0){
            $this->response([
                'status' => true,
                'message' => 'new customer has been updated'
            ], REST_Controller::HTTP_OK);
        }else{
            //id not found
            $this->response([
                'status' => false,
                'message' => 'failed to update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

    }

}

/* End of file Data_mobil.php */

?>