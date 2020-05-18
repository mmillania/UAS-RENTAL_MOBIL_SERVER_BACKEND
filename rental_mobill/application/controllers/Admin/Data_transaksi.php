<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_transaksi extends CI_Controller {

    public function index()
    {   
        $data['transaksi'] = $this->db->query("select * from transaksi tr, mobil mb, customer cs 
        where tr.id_mobil = mb.id_mobil and tr.id_customer = cs.id_customer")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('Admin/Data_transaksi', $data);
        $this->load->view('templates_admin/footer');

    }

    public function pembayaran($id){
        $where = array('id_rental' => $id);
        $data['pembayaran'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental='$id'")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('Admin/Konfirmasi_pembayaran', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cek_pembayaran(){
        $id = $this->input->post('id_rental');
        $status_pembayaran = $this->input->post('status_pembayaran');

        $data = array(
            'status_pembayaran' => $status_pembayaran,
        );

        $where = array(
            'id_rental' => $id
        );

        $this->Rental_model->update_data('transaksi',$data,$where);
        redirect('Admin/Data_transaksi');
    }

    public function download_pembayaran($id){
        $this->load->helper('download');
        $filePembayaran = $this->Rental_model->downloadPembayaran($id);
        $file = 'assets/upload/'.$filePembayaran['bukti_pembayaran'];
        force_download($file, NULL);
    }

    public function transaksi_selesai($id){
        $where = array('id_rental' => $id);
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental='$id'")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('Admin/Transaksi_selesai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function transaksi_selesai_aksi(){
        $id = $this->input->post('id_rental');
        $tgl_pengembalian = $this->input->post('tgl_pengembalian');
        $status_rental = $this->input->post('status_rental');
        $status_pengembalian = $this->input->post('status_pengembalian');
        $tgl_kembali = $this->input->post('tgl_kembali');
        $denda = $this->input->post('denda');
        
        // //ngitung total denda
        // $x = strtotime($tgl_pengembalian);
        // $y = strtotime($tgl_kembali);
        // $selisih = abs($x - $y)/(60*60*24);
        // $total_denda = $selisih * $denda;
        // $total_denda = $this->input->post('total_denda');
        


        $data = array(
            'tgl_pengembalian' => $tgl_pengembalian,
            'status_rental' => $status_rental,
            'status_pengembalian' => $status_pengembalian,
           
        );

        $where = array(
            'id_rental' => $id
        );

        $this->Rental_model->update_data('transaksi', $data, $where);
       
        $this->session->set_flashdata('pesan' ,'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Transaksi Berhasil Di Update!.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('Admin/Data_transaksi');

    }

    // public function tambah_transaksi()
    // {
    //    $this->load->view('templates_admin/header');
    //    $this->load->view('templates_admin/sidebar');
    //    $this->load->view('Admin/Form_tambah_transaksi');
    //    $this->load->view('templates_admin/footer');

    // }

    // public function tambah_transaksi_aksi()
    // {
    //    $this->_rules();

    //    if ($this->form_validation->run() == FALSE) {
    //        $this->tambah_transaksi();
    //    }else {
    //        $id_mobil                = $this->input->post('id_mobil');
    //        $nama                    = $this->input->post('nama');
    //        $noiden                  = $this->input->post('noiden');
    //        $notelp                  = $this->input->post('notelp');
    //        $tgl_rental              = $this->input->post('tgl_rental');
    //        $tgl_kembali             = $this->input->post('tgl_kembali');
    //        $tanggal_pengembalian    = $this->input->post('tanggal_pengembalian');
    //        $status_rental           = $this->input->post('status_rental');
    //        $status_pengembalian     = $this->input->post('status_pengembalian');

    //        $data = array (
    //            'id_mobil'               => $id_mobil,
    //            'nama'                   => $nama,
    //            'noiden'                 => $noiden,
    //            'notelp'                 => $notelp,
    //            'tgl_rental'             => $tgl_rental,
    //            'tgl_kembali'            => $tgl_kembali,
    //            'tanggal_pengembalian'   => $tanggal_pengembalian,
    //            'status_rental'          => $status_rental,
    //            'status_pengembalian'    => $status_pengembalian
    //        );

    //        $this->Rental_model->insert_data($data, 'rental');
    //        $this->session->set_flashdata('pesan' ,'<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         Data Transaksi Berhasil Ditambahkan!.
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //         redirect ('Admin/Data_transaksi');
    //    }

    // }

    // public function delete_transaksi($id){
    //     $where = array('id_rental' => $id);
    //     $this->Rental_model->delete_data($where,'rental');
    //             $this->session->set_flashdata('pesan' ,'<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //             Data Rental Berhasil Dihapus.
    //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //               <span aria-hidden="true">&times;</span>
    //             </button>
    //           </div>');
    //             redirect ('Admin/Data_transaksi');
    //     }

    //     public function update_transaksi($id){
    //       $where = array ('id_rental' => $id);
    //       $data['rental'] = $this->db->query("SELECT * FROM rental WHERE id_rental = '$id'")->result();
    //      $this->load->view('templates_admin/header');
    //      $this->load->view('templates_admin/sidebar');
    //      $this->load->view('Admin/Form_update_transaksi', $data);
    //      $this->load->view('templates_admin/footer');
    //   }
  
    //   public function update_transaksi_aksi(){
    //       $this->_rules();
  
    //       if ($this->form_validation->run() == FALSE){
    //           $this->update_transaksi();
    //       }else{
    //           $id = $this->input->POST('id_rental');
    //           $id_mobil = $this->input->POST('id_mobil');
    //           $nama = $this->input->POST('nama');
    //           $noiden = $this->input->POST('noiden');
    //           $notelp = $this->input->POST('notelp');
    //           $tgl_rental = $this->input->POST('tgl_rental');
    //           $tgl_kembali = $this->input->POST('tgl_kembali');
    //           $tanggal_pengembalian = $this->input->POST('tanggal_pengembalian');
    //           $status_rental = $this->input->POST('status_rental');
    //           $status_pengembalian = $this->input->POST('status_pengembalian');
            
  
    //           $data = array(
    //             'id_mobil'               => $id_mobil,
    //             'nama'                   => $nama,
    //             'noiden'                 => $noiden,
    //             'notelp'                 => $notelp,
    //             'tgl_rental'             => $tgl_rental,
    //             'tgl_kembali'            => $tgl_kembali,
    //             'tanggal_pengembalian'   => $tanggal_pengembalian,
    //             'status_rental'          => $status_rental,
    //             'status_pengembalian'    => $status_pengembalian
                  
    //           );
    //           $where = array(
    //               'id_rental' => $id
    //           );
  
    //           $this->Rental_model->update_data('rental', $data, $where);
    //           $this->session->set_flashdata('pesan' ,'<div class="alert alert-success alert-dismissible fade show" role="alert">
    //           Data Rental Berhasil Diperbaharui!.
    //           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //             <span aria-hidden="true">&times;</span>
    //           </button>
    //         </div>');
    //           redirect ('Admin/Data_transaksi');
    //       }
    //   }
  

    // public function _rules()
    // {
    //     $this->form_validation->set_rules('nama','Nama Customer', 'required');
    //     $this->form_validation->set_rules('id_mobil','ID Mobil', 'required');
    //     $this->form_validation->set_rules('noiden','No Identitas', 'required');
    //     $this->form_validation->set_rules('notelp','No Telpon', 'required');
    //     $this->form_validation->set_rules('tgl_rental','Tanggal Pinjam', 'required');
    //     $this->form_validation->set_rules('tgl_kembali','Tanggal Kembali', 'required');
    //     $this->form_validation->set_rules('tanggal_pengembalian','Tanggal Pengembalian', 'required');
    //     $this->form_validation->set_rules('status_rental','Status Pengembalian', 'required');
    //     $this->form_validation->set_rules('status_pengembalian','Status Transaksi', 'required');
    // }

}

/* End of file Data_transaksi.php */

?>
