<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Rental_model extends CI_Model {

    public function get_data($table){
        return $this->db->get($table);
    }

    public function insert_data($data, $table){
        $this->db->insert($table,$data);
    }

    public function update_data($table, $data, $where){
        $this->db->update($table, $data, $where);
    }

    public function delete_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function ambil_id_mobil($id){
        $hasil = $this->db->where('id_mobil', $id)->get('mobil');

        if($hasil->num_rows() > 0){
            return $hasil->result();
        }else{
            return false;
        }
    }

    public function cek_login()
    {
        $username = set_value('username');
        $password = set_value('password');

        $result = $this->db
                       ->where('username', $username)
                       ->where('password', md5($password))
                       ->limit(1)
                       ->get('customer');

        if ($result->num_rows() > 0) {
            return $result->row();
        }else{
            return FALSE;
        }
    }

    public function getMobil($id = null)
    {
        if($id == null) {
            return $this->db->query("select * from mobil mb, type tp where mb.kode_type = tp.kode_type")->result();
        } else {
            return $this->db->query("select * from mobil mb, type tp where mb.kode_type = tp.kode_type and mb.id_mobil =$id")->result_array();
        }
    }

    public function deleteMobil($id){
        $this->db->delete('mobil',['id_mobil' => $id]);
        return $this->db->affected_rows();
    }

    public function createMobil($data){
        $this->db->insert('mobil', $data);
        return $this->db->affected_rows();
    }

    public function updateMobil($data, $id){
        $this->db->update('mobil', $data, ['id_mobil' => $id]);
        return $this->db->affected_rows();
    }

    public function getRental($id = null)
    {
        if($id == null) {
            return $this->db->query("select * from transaksi tr, mobil mb, customer cs 
            where tr.id_mobil = mb.id_mobil and tr.id_customer = cs.id_customer")->result();
        } else {
            return $this->db->get_where('transaksi',['id_rental'=>$id])->result_array();
        }
    }

    public function deleteRental($id){
        $this->db->delete('transaksi',['id_rental' => $id]);
        return $this->db->affected_rows();
    }

    public function createRental($data){
        $this->db->insert('transaksi', $data);
        return $this->db->affected_rows();
    }

    public function updateRental($data, $id){
        $this->db->update('transaksi', $data, ['id_rental' => $id]);
        return $this->db->affected_rows();
    }

    public function getCustomer($id = null)
    {
        if($id == null) {
            return $this->db->get('customer')->result_array();
        } else {
            return $this->db->get_where('customer',['id_customer'=>$id])->result_array();
        }
    }

    public function deleteCustomer($id){
        $this->db->delete('customer',['id_customer' => $id]);
        return $this->db->affected_rows();
    }

    public function createCustomer($data){
        $this->db->insert('customer', $data);
        return $this->db->affected_rows();
    }

    public function updateCustomer($data, $id){
        $this->db->update('customer', $data, ['id_customer' => $id]);
        return $this->db->affected_rows();
    }

    public function getType($id = null)
    {
        if($id == null) {
            return $this->db->get('type')->result_array();
        } else {
            return $this->db->get_where('type',['id_type'=>$id])->result_array();
        }
    }

    public function deleteType($id){
        $this->db->delete('type',['id_type' => $id]);
        return $this->db->affected_rows();
    }

    public function createType($data){
        $this->db->insert('type', $data);
        return $this->db->affected_rows();
    }

    public function updateType($data, $id){
        $this->db->update('type', $data, ['id_type' => $id]);
        return $this->db->affected_rows();
    }

    public function getTransaksi()
    {
        $this->db->select ('*' );
        $this->db->from('transaksi');
        $this->db->join('customer','customer.id_customer = transaksi.id_customer');
        $this->db->join('mobil','mobil.id_mobil = transaksi.id_mobil');
        $query = $this->db->get();

        // https://www.codeigniter.com/user_guide/database/results.html
        return $query->result();
    }

    public function downloadPembayaran($id){
        $query = $this->db->get_where('transaksi',array('id_rental' => $id));
        return $query->row_array();
    }

    
    
}

/* End of file Rental_model.php */


?>
