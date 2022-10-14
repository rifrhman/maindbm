<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
    $data['title'] = "Dashboard";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('Temp/header', $data);
    $this->load->view('Temp/navbar', $data);
    $this->load->view('Temp/sidebar', $data);
    $this->load->view('dashboard', $data);
    $this->load->view('Temp/footer');
  }
}