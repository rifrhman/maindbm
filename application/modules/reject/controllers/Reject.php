<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reject extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('username')) {
      redirect('auth');
    }
    if ($this->session->userdata('level_id') != 3) {
      show_404();
    }
    $this->load->model('reject_model', 'reject');
  }

  public function index()
  {
    $data['title'] = "Halaman Reject Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['rejects'] = $this->reject->getRejected();

    $this->load->view('Temp_sourcing/header', $data);
    $this->load->view('Temp_sourcing/navbar', $data);
    $this->load->view('Temp_sourcing/sidebar', $data);
    $this->load->view('reject_index', $data);
    $this->load->view('Temp_sourcing/footer');
  }
}