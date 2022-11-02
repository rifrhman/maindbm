<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Remainder extends CI_Controller
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

    $this->load->model('Remainder_model', 'rem');
  }

  public function index()
  {
    $data['title'] = "Remainder Karyawan";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $this->load->view('Temp_admin/header', $data);
    $this->load->view('Temp_admin/navbar', $data);
    $this->load->view('Temp_admin/sidebar', $data);
    $this->load->view('remainder_view', $data);
    $this->load->view('Temp_admin/footer');
  }
}