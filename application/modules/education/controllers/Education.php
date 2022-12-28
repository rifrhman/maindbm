<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Education extends CI_Controller
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
    $data['title'] = "Halaman Pendidikan";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->model('Education_model', 'education');
    $data['candidate'] = $this->education->getStatusTest();

    $this->load->view('Temp_sourcing/header', $data);
    $this->load->view('Temp_sourcing/navbar', $data);
    $this->load->view('Temp_sourcing/sidebar', $data);
    $this->load->view('education_view', $data);
    $this->load->view('Temp_sourcing/footer');
  }

  public function add_education($id_candidate)
  {
    $data['title'] = "Halaman Tambah Pendidikan";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['list'] = $this->db->get('education')->result_array();
    $this->load->model('Education_model');
    $data['educate'] = $this->Education_model->detailEducation($id_candidate);

    $validation = $this->form_validation;

    $validation->set_rules('degree', 'Degree', 'required');
    $validation->set_rules('institute', 'Institute', 'required|trim');
    $validation->set_rules('major', 'Major', 'required|trim');
    $validation->set_rules('city', 'City', 'required|trim');
    $validation->set_rules('score', 'score', 'required|trim|numeric');
    $validation->set_rules('year_in_edu', 'Year In', 'required|numeric');
    $validation->set_rules('year_out_edu', 'Year Out', 'required|numeric');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('add_education', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {
      $data = [
        'degree' => $this->input->post('degree'),
        'institute' => $this->input->post('institute'),
        'major' => $this->input->post('major'),
        'city' => $this->input->post('city'),
        'score' => $this->input->post('score'),
        'year_in_edu' => $this->input->post('year_in_edu'),
        'year_out_edu' => $this->input->post('year_out_edu'),
        'basic_id' => $id_candidate
      ];

      $this->db->insert('education', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Horee!</strong> Data Pendidikan berhasil ditambah.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
      redirect('education/add_education/' . $id_candidate);
    }
  }
}