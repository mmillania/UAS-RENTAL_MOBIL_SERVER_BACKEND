<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'libraries/REST_Controller.php';
require APPPATH .'libraries/Format.php';

class Data_mobil extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rental_model','mobil');
    }

    public function index_get()
    {
        $id = $this->get('id_mobil');
        if($id === null) {
            $mobil = $this->mobil->getMobil();
        } else {
            $mobil = $this->mobil->getMobil($id);
        }

            if($mobil) {
                $this->response([
                    'status' => true,
                    'data' => $mobil
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
    }

    public function index_delete(){
        $id=$this->delete('id_mobil');

        if($id===null) {
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if ($this->mobil->deleteMobil($id) > 0){
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

            'kode_type' => $this->POST('kode_type'),
            'merk' => $this->POST('merk'),
            'nopol' => $this->POST('nopol'),
            'warna' => $this->POST('warna'),
            'tahun' => $this->POST('tahun'),
            'harga' => $this->POST('harga'),
            'status' => $this->POST('status'),
            'denda' => $this->POST('denda'),
            'ac' => $this->POST('ac'),
            'mp3_player' => $this->POST('mp3_player'),
            'central_lock' => $this->POST('central_lock'),
            'supir' => $this->POST('supir'),
        ];

        if($this->mobil->createMobil($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'new mobil has been created'
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
        $id = $this->put('id_mobil');
        $data = [
            'kode_type' => $this->PUT('kode_type'),
            'merk' => $this->PUT('merk'),
            'nopol' => $this->PUT('nopol'),
            'warna' => $this->PUT('warna'),
            'tahun' => $this->PUT('tahun'),
            'harga' => $this->PUT('harga'),
            'status' => $this->PUT('status'),
            'denda' => $this->PUT('denda'),
            'ac' => $this->PUT('ac'),
            'mp3_player' => $this->PUT('mp3_player'),
            'central_lock' => $this->PUT('central_lock'),
            'supir' => $this->PUT('supir'),
        ];

        if($this->mobil->updateMobil($data, $id) > 0){
            $this->response([
                'status' => true,
                'message' => 'new mobil has been updated'
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