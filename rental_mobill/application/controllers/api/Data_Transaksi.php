<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'libraries/REST_Controller.php';
require APPPATH .'libraries/Format.php';

class Data_Transaksi extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rental_model','transaksi');
    }

    public function index_get()
    {
        $id = $this->get('id_rental');
        if($id === null) {
            $transaksi = $this->transaksi->getRental();
        } else {
            $transaksi = $this->transaksi->getRental($id);
        }

            if($transaksi) {
                $this->response([
                    'status' => true,
                    'data' => $transaksi
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
    }

    public function index_delete(){
        $id=$this->delete('id_rental');

        if($id===null) {
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if ($this->transaksi->deleteRental($id) > 0){
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

            'id_customer'         => $this->post('id_customer'),
            'id_mobil'            => $this->post('id_mobil'),
            'tgl_rental'          => $this->post('tgl_rental'),
            'tgl_kembali'         => $this->post('tgl_kembali'),
            'harga'               => $this->post('harga'),
            'denda'               => $this->post('denda'),
            'total_denda'         => $this->post('total_denda'),
            'tgl_pengembalian'    => $this->post('tgl_pengembalian'),
            'status_pengembalian' => $this->post('status_pengembalian'),
            'status_rental'       => $this->post('status_rental'),
            'bukti_pembayaran'    => $this->post('bukti_pembayaran'),
            'status_pembayaran'   => $this->post('status_pembayaran'),
        ];

        if($this->transaksi->createRental($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'new transaksi has been created'
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
        $id = $this->put('id_rental');
        $data = [

            'id_customer'         => $this->put('id_customer'),
            'id_mobil'            => $this->put('id_mobil'),
            'tgl_rental'          => $this->put('tgl_rental'),
            'tgl_kembali'         => $this->put('tgl_kembali'),
            'harga'               => $this->put('harga'),
            'denda'               => $this->put('denda'),
            'total_denda'         => $this->put('total_denda'),
            'tgl_pengembalian'    => $this->put('tgl_pengembalian'),
            'status_pengembalian' => $this->put('status_pengembalian'),
            'status_rental'       => $this->put('status_rental'),
            'bukti_pembayaran'    => $this->put('bukti_pembayaran'),
            'status_pembayaran'   => $this->put('status_pembayaran'),
           
        ];

        if($this->transaksi->updateRental($data, $id) > 0){
            $this->response([
                'status' => true,
                'message' => 'new transaksi has been updated'
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