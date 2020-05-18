<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'libraries/REST_Controller.php';
require APPPATH .'libraries/Format.php';

class Data_type extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rental_model','type');
    }

    public function index_get()
    {
        $id = $this->get('id_type');
        if($id === null) {
            $type = $this->type->getType();
        } else {
            $type = $this->type->getType($id);
        }

            if($type) {
                $this->response([
                    'status' => true,
                    'data' => $type
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
    }

    public function index_delete(){
        $id=$this->delete('id_type');

        if($id===null) {
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if ($this->type->deleteType($id) > 0){
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

            'kode_type'  => $this->post('kode_type'),
            'nama_type'  => $this->post('nama_type'),
            
        ];

        if($this->type->createType($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'new type has been created'
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
        $id = $this->put('id_type');
        $data = [

            'kode_type' => $this->put('kode_type'),
            'nama_type' => $this->put('nama_type'),
           
        ];

        if($this->type->updateType($data, $id) > 0){
            $this->response([
                'status' => true,
                'message' => 'new type has been updated'
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