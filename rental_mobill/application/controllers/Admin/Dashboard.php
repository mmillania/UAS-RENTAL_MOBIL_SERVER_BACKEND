<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {   $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('Admin/Dashboard');
        $this->load->view('templates_admin/footer');

    }

}

/* End of file Dashboard.php */

?>
