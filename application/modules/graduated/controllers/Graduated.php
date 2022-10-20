<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Graduated extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('username')) {
      redirect('auth');
    }
    if ($this->session->userdata('level_id') != 3 && $this->session->userdata('level_id') != 2) {
      show_404();
    }
  }

  public function index()
  {
    $data['title'] = "Halaman Kandidat Lulus";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->model('Graduate_model', 'grad');
    $data['candidate'] = $this->grad->getStatusTest();
    $data['exp'] = $this->grad->expIndex();
    $data['send'] = $this->grad->getStatusSend();
    $data['candi'] = $this->db->get('send_candidate')->row_array();

    $this->load->view('Temp_sourcing/header', $data);
    $this->load->view('Temp_sourcing/navbar', $data);
    $this->load->view('Temp_sourcing/sidebar', $data);
    $this->load->view('grad_index', $data);
    $this->load->view('Temp_sourcing/footer');
  }

  public function detailgraduatecandidate($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $this->load->model('graduate_model', 'sour');
    $data['list'] = $this->sour->detailAll($id_candidate);
    $data['second'] = $this->sour->detailSecond($id_candidate);
    $data['educate'] = $this->sour->detailEducation($id_candidate);
    $data['exp'] = $this->sour->detailExp($id_candidate);

    $validation = $this->form_validation;

    $validation->set_rules('note_recommend', 'Note', 'required');


    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('detail_graduate', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {
      $note = $this->input->post('note_recommend');

      $this->db->set('note_recommend', $note);
      $this->db->where('id_candidate', $this->input->post('id_candidate'));
      $this->db->update('candidate_basic');
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Horee!</strong> Note rekomendasi berhasil ditambah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('graduated');
    }
  }

  public function addsend_candidate($id_candidate)
  {
    $data['title'] = "Pengiriman kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['list'] = $this->db->get('send_candidate')->result_array();

    $validation = $this->form_validation;

    $validation->set_rules('client', 'Client', 'required|trim');
    $validation->set_rules('position', 'Position', 'required|trim');
    $validation->set_rules('date_send', 'Date Send', 'required|trim');
    $validation->set_rules('result_send', 'Result Send', 'required|trim');
    $validation->set_rules('created_by', 'Created By', 'required');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('addsend_view', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {

      $data = [
        'client' => $this->input->post('client'),
        'position' => $this->input->post('position'),
        'date_send' => $this->input->post('date_send'),
        'result_send' => $this->input->post('result_send'),
        'created_by' => $this->input->post('created_by'),
        'basic_id' => $id_candidate
      ];

      $this->db->insert('send_candidate', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Horee!</strong> Data kirim kandidat berhasil ditambah.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
      redirect('graduated');
    }
  }

  public function update_status($id)
  {
    $data['title'] = "Pengiriman kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['status'] = $this->db->get_where('send_candidate', ['id' => $id])->row_array();

    $validation = $this->form_validation;

    $validation->set_rules('result_send', 'Result', 'required|trim');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('edit_result', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {
      $result_send = $this->input->post('result_send');

      $this->db->set('result_send', $result_send);
      $this->db->where('id', $this->input->post('id'));

      $this->db->update('send_candidate');
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Horeee!</strong> Status berhasil di update .
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>');
      redirect('graduated');
    }
  }

  public function editbasic($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $this->load->model('graduate_model', 'sour');
    $data['list'] = $this->sour->detailAll($id_candidate);
    $data['second'] = $this->sour->detailSecond($id_candidate);
    $data['educate'] = $this->sour->detailEducation($id_candidate);
    $data['exp'] = $this->sour->detailExp($id_candidate);

    $validation = $this->form_validation;

    $validation->set_rules('fullname', 'Fullname', 'required|trim');
    $validation->set_rules('place_of_birth', 'Place Of Birth', 'required|trim');
    $validation->set_rules('date_of_birth', 'Date Of Birth', 'required|trim');
    $validation->set_rules('phone_number', 'Phone Number', 'required|trim|numeric|min_length[10]');
    $validation->set_rules('domicile', 'Domicile', 'required|trim');
    $validation->set_rules('gender', 'Gender', 'required|trim');
    $validation->set_rules('last_education', 'Last Education', 'required|trim');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('detail_graduate', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {
      $fullname = $this->input->post('fullname');
      $place_of_birth = $this->input->post('place_of_birth');
      $date_of_birth = $this->input->post('date_of_birth');
      $phone_number = $this->input->post('phone_number');
      $domicile = $this->input->post('domicile');
      $gender = $this->input->post('gender');
      $last_education = $this->input->post('last_education');


      $this->db->set('fullname', $fullname);
      $this->db->set('place_of_birth', $place_of_birth);
      $this->db->set('date_of_birth', $date_of_birth);
      $this->db->set('phone_number', $phone_number);
      $this->db->set('domicile', $domicile);
      $this->db->set('gender', $gender);
      $this->db->set('last_education', $last_education);
      $this->db->where('id_candidate', $this->input->post('id_candidate'));
      $this->db->update('candidate_basic');
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Horee!</strong> Edit Data Basic berhasil.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>');
      redirect('graduated/detailgraduatecandidate/' . $id_candidate);
    }
  }

  public function editsecondary($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    // $data['basic'] = $this->db->get('candidate_secondary', ['basic_id' => $basic_id])->row_array();
    $this->load->model('graduate_model', 'sour');
    $data['all'] = $this->sour->getAll($id_candidate);
    $data['list'] = $this->sour->detailAll($id_candidate);
    $data['second'] = $this->sour->detailSecond($id_candidate);
    $data['educate'] = $this->sour->detailEducation($id_candidate);
    $data['exp'] = $this->sour->detailExp($id_candidate);


    $validation = $this->form_validation;

    $validation->set_rules('regis_num_candidate', 'Regis num candidate', 'required|trim');
    $validation->set_rules('regis_num_resident', 'regis_num_resident', 'required|trim');
    $validation->set_rules('email', 'Email', 'required|trim');
    $validation->set_rules('religion', 'religion', 'required|trim');
    $validation->set_rules('tall', 'tall', 'required|trim');
    $validation->set_rules('weight', 'weight', 'required|trim');
    $validation->set_rules('marital_status', 'Marital Status', 'required|trim');
    $validation->set_rules('postal_code', 'Postal Code', 'required|trim');


    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('detail_graduate', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {
      $regis_num_candidate = $this->input->post('regis_num_candidate');
      $regis_num_resident = $this->input->post('regis_num_resident');
      $email = $this->input->post('email');
      $religion = $this->input->post('religion');
      $tall = $this->input->post('tall');
      $weight = $this->input->post('weight');
      $marital_status = $this->input->post('marital_status');
      $postal_code = $this->input->post('postal_code');


      $this->db->set('regis_num_candidate', $regis_num_candidate);
      $this->db->set('regis_num_resident', $regis_num_resident);
      $this->db->set('email', $email);
      $this->db->set('religion', $religion);
      $this->db->set('tall', $tall);
      $this->db->set('weight', $weight);
      $this->db->set('marital_status', $marital_status);
      $this->db->set('postal_code', $postal_code);
      $this->db->where('basic_id', $this->input->post('basic_id'));
      $this->db->update('candidate_secondary');
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Horee!</strong> Edit Data Secondary berhasil.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>');
      redirect('graduated/detailgraduatecandidate/' . $id_candidate);
    }
  }

  public function contract_form($id)
  {
    $data['title'] = "Kontrak Form Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['status'] = $this->db->get_where('send_candidate', ['id' => $id])->row_array();
    $data['candidate'] = $this->db->get('candidate_basic');

    $validation = $this->form_validation;

    $validation->set_rules('placement', 'Placement', 'required|trim');
    $validation->set_rules('salary', 'Salary', 'required|trim|numeric');
    $validation->set_rules('start_date', 'Start_date', 'required|trim');
    $validation->set_rules('end_date', 'End_date', 'required|trim');
    $validation->set_rules('desc_send', 'Description');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('contract_form', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {
      $placement = $this->input->post('placement');
      $salary = $this->input->post('salary');
      $start_date = $this->input->post('start_date');
      $end_date = $this->input->post('end_date');
      $desc_send = $this->input->post('desc_send');

      $this->db->set('placement', $placement);
      $this->db->set('salary', $salary);
      $this->db->set('start_date', $start_date);
      $this->db->set('end_date', $end_date);
      $this->db->set('desc_send', $desc_send);
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('send_candidate');
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Horee!</strong> Contract berhasil dibuat .
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>');
      redirect('graduated');
    }
  }
}