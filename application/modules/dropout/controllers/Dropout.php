<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dropout extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('username')) {
      redirect('auth');
    }
    if ($this->session->userdata('level_id') != 1) {
      show_404();
    }
  }

  public function index()
  {
    $data['title'] = "Karyawan Keluar";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    // $data['countNull'] = $this->con->countJoinEmpNull();
    $this->load->view('Temp_admin/header', $data);
    $this->load->view('Temp_admin/navbar', $data);
    $this->load->view('Temp_admin/sidebar', $data);
    $this->load->view('dropout_view', $data);
    $this->load->view('Temp_admin/footer');
  }
}