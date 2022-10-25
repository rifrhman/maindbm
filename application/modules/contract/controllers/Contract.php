<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contract extends CI_Controller
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
    $this->load->model('Contract_model', 'con');
  }

  public function index()
  {
    $data['title'] = "Join Kontrak";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['countNull'] = $this->con->countJoinEmpNull();
    $this->load->view('Temp_admin/header', $data);
    $this->load->view('Temp_admin/navbar', $data);
    $this->load->view('Temp_admin/sidebar', $data);
    $this->load->view('contract_view', $data);
    $this->load->view('Temp_admin/footer');
  }
  public function getDataScore()
  {
    // header('Content-Type: application/json');

    $results = $this->con->getDataTable();

    $data = [];
    $no = $_POST['start'];
    foreach ($results as $result) {
      $row = array();
      $row[] = ++$no;
      $row[] = $result->fullname;
      $row[] = $result->client;
      $row[] = $result->position;
      $row[] = $result->start_date . ' - ' . $result->end_date;
      $row[] = $result->created_by;
      $row[] = '
      <a href="' . base_url('contract/detail_contract/') . $result->id_candidate . '"
class="btn bg-gradient-blue btn-sm text-light"><i class="fas fa-fw fa-info"></i> Detail</a><br>';
      $data[] = $row;
    }

    $output = array(
      'draw' => $_POST['draw'],
      'recordsTotal' => $this->con->count_all_data(),
      'recordsFiltered' => $this->con->count_filtered_data(),
      'data' => $data
    );

    $this->output->set_output(json_encode($output));
  }

  public function detail_contract($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['list'] = $this->con->detailAll($id_candidate);
    $data['second'] = $this->con->detailSecond($id_candidate);
    $data['educate'] = $this->con->detailEducation($id_candidate);
    $data['exp'] = $this->con->detailExp($id_candidate);


    $this->load->view('Temp_admin/header', $data);
    $this->load->view('Temp_admin/navbar', $data);
    $this->load->view('Temp_admin/sidebar', $data);
    $this->load->view('detail_contract_view', $data);
    $this->load->view('Temp_admin/footer');
  }

  public function editbasic($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['list'] = $this->con->detailAll($id_candidate);
    $data['second'] = $this->con->detailSecond($id_candidate);
    $data['educate'] = $this->con->detailEducation($id_candidate);
    $data['exp'] = $this->con->detailExp($id_candidate);

    $validation = $this->form_validation;

    $validation->set_rules('fullname', 'Fullname', 'required|trim');
    $validation->set_rules('place_of_birth', 'Place Of Birth', 'required|trim');
    $validation->set_rules('date_of_birth', 'Date Of Birth', 'required|trim');
    $validation->set_rules('phone_number', 'Phone Number', 'required|trim|numeric|min_length[10]');
    $validation->set_rules('domicile', 'Domicile', 'required|trim');
    $validation->set_rules('gender', 'Gender');
    $validation->set_rules('last_education', 'Last Education', 'required|trim');

    if ($validation->run() == false) {
      $this->load->view('Temp_admin/header', $data);
      $this->load->view('Temp_admin/navbar', $data);
      $this->load->view('Temp_admin/sidebar', $data);
      $this->load->view('detail_contract_view', $data);
      $this->load->view('Temp_admin/footer');
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
      redirect('contract/detail_contract/' . $id_candidate);
    }
  }

  public function editsecondary($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    // $data['basic'] = $this->db->get('candidate_secondary', ['basic_id' => $basic_id])->row_array();

    $data['all'] = $this->con->getAll($id_candidate);
    $data['list'] = $this->con->detailAll($id_candidate);
    $data['second'] = $this->con->detailSecond($id_candidate);
    $data['educate'] = $this->con->detailEducation($id_candidate);
    $data['exp'] = $this->con->detailExp($id_candidate);


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
      $this->load->view('detail_contract_view', $data);
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
      redirect('contract/detail_contract/' . $id_candidate);
    }
  }
}