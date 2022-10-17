<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reference extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('username')) {
      redirect('auth');
    }
    if ($this->session->userdata('level_id') != 2) {
      show_404();
    }
  }


  public function index()
  {
    $data['title'] = "Halaman Kandidat Referensi";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->model('Reference_model', 'ref');
    $data['candidate'] = $this->ref->getStatusTest();
    $data['exp'] = $this->ref->expIndex();
    $data['send'] = $this->ref->getStatusSend();
    $data['candi'] = $this->db->get('send_candidate')->row_array();

    $this->load->view('Temp_sourcing/header', $data);
    $this->load->view('Temp_sourcing/navbar', $data);
    $this->load->view('Temp_sourcing/sidebar', $data);
    $this->load->view('ref_index', $data);
    $this->load->view('Temp_sourcing/footer');
  }
}