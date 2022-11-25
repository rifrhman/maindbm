<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Experience extends CI_Controller
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
    $data['title'] = "Halaman Pengalaman";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->model('Exp_model', 'exp');
    $data['candidate'] = $this->exp->getStatusTest();

    $this->load->view('Temp_sourcing/header', $data);
    $this->load->view('Temp_sourcing/navbar', $data);
    $this->load->view('Temp_sourcing/sidebar', $data);
    $this->load->view('exp_view', $data);
    $this->load->view('Temp_sourcing/footer');
  }

  public function add_exp($id_candidate)
  {
    $data['title'] = "Pengalaman Kandidat Baru";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['list'] = $this->db->get('experience')->result_array();
    $validation = $this->form_validation;

    $validation->set_rules('company', 'Company', 'required|trim');
    $validation->set_rules('position_exp', 'Position');
    $validation->set_rules('year_in_exp', 'Year In');
    $validation->set_rules('month_period', 'Month Period');
    $validation->set_rules('last_salary', 'Last Salary');
    $validation->set_rules('Resign', 'Resign');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('addexp_view', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {
      $data = [
        'company' => $this->input->post('company'),
        'position_exp' => $this->input->post('position_exp'),
        'year_in_exp' => $this->input->post('year_in_exp'),
        'month_period' => $this->input->post('month_period'),
        'last_salary' => $this->input->post('last_salary'),
        'resign' => $this->input->post('resign'),
        'basic_id' => $id_candidate
      ];

      $this->db->insert('experience', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Horee!</strong> Data kandidat berhasil ditambahkan pengalaman.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('experience/add_exp/' . $id_candidate);
    }
  }
}