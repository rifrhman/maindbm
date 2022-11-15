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

    $this->load->model('admin_model', 'amod');
  }

  public function index()
  {
    $data['title'] = "Dashboard";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['countjoin'] = $this->amod->countJoinEmp();
    $data['countemp'] = $this->amod->countEmpActive();
    $data['countempresign'] = $this->amod->countResign();
    $data['countempblacklist'] = $this->amod->countBlacklist();
    $this->load->view('Temp_admin/header', $data);
    $this->load->view('Temp_admin/navbar', $data);
    $this->load->view('Temp_admin/sidebar', $data);
    $this->load->view('dashboard', $data);
    $this->load->view('Temp_admin/footer');
  }
}