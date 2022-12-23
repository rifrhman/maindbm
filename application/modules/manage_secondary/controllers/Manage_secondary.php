<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_secondary extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('username')) {
      redirect('auth');
    }
    if ($this->session->userdata('level_id') != 5) {
      show_404();
    }
    $this->load->model('Manage_secondary_model', 'man_sec');
  }

  public function index()
  {
    $data['title'] = "Candidate Secondary - Super Admin";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $this->load->view('temp_manage/header', $data);
    $this->load->view('temp_manage/navbar', $data);
    $this->load->view('temp_manage/sidebar', $data);
    $this->load->view('manage_secondary_index', $data);
    $this->load->view('temp_manage/footer');
  }

  public function candidate_secondary_list()
  {
    $list = $this->man_sec->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $person) {
      $no++;
      $row = array();
      $row[] = $person->basic_id;
      $row[] = $person->regis_num_candidate;
      $row[] = $person->fullname;
      $row[] = $person->email;
      $row[] = $person->status_test;

      //add html for action
      $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_secondary(' . "'" . $person->basic_id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_secondary(' . "'" . $person->basic_id . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->man_sec->count_all(),
      "recordsFiltered" => $this->man_sec->count_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  }


  public function candidate_secondary_edit($basic_id)
  {
    $data = $this->man_sec->get_by_id($basic_id);
    // $data->test_one = ($data->test_one == '0000-00-00') ? '' : $data->test_one; // if 0000-00-00 set tu empty for datepicker compatibility
    echo json_encode($data);
  }


  public function candidate_secondary_update()
  {
    $this->_validate();
    $data = array(
      'regis_num_candidate' => $this->input->post('regis_num_candidate'),
      'regis_num_resident' => $this->input->post('regis_num_resident'),
      'email' => $this->input->post('email'),
      'religion' => $this->input->post('religion'),
      'tall' => $this->input->post('tall'),
      'weight' => $this->input->post('weight'),
      'marital_status' => $this->input->post('marital_status'),
      'postal_code' => $this->input->post('postal_code'),
      'certificate' => $this->input->post('certificate'),
      'validity_period' => $this->input->post('validity_period'),
      'status_test' => $this->input->post('status_test'),
    );
    $this->man_sec->update(array('basic_id' => $this->input->post('basic_id')), $data);
    echo json_encode(array("status" => TRUE));
  }


  public function candidate_basic_add()
  {
    $this->_validate();
    $data = array(
      'fullname' => $this->input->post('fullname'),
      'place_of_birth' => $this->input->post('place_of_birth'),
      'date_of_birth' => $this->input->post('date_of_birth'),
      'domicile' => $this->input->post('domicile'),
      'phone_number' => $this->input->post('phone_number'),
      'gender' => $this->input->post('gender'),
      'last_education' => $this->input->post('last_education'),
      'test_one' => $this->input->post('test_one'),
    );
    $this->man_sec->save($data);
    echo json_encode(array("status" => TRUE));
  }

  public function candidate_secondary_del($basic_id)
  {
    $this->man_sec->delete_by_id($basic_id);
    echo json_encode(array("status" => TRUE));
  }


  private function _validate()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if ($this->input->post('regis_num_candidate') == '') {
      $data['inputerror'][] = 'regis_num_candidate';
      $data['error_string'][] = 'regis_num_candidate is required';
      $data['status'] = FALSE;
    }

    if ($this->input->post('regis_num_resident') == '') {
      $data['inputerror'][] = 'regis_num_resident';
      $data['error_string'][] = 'regis_num_resident is required';
      $data['status'] = FALSE;
    }

    if ($this->input->post('email') == '') {
      $data['inputerror'][] = 'email';
      $data['error_string'][] = 'Email is required';
      $data['status'] = FALSE;
    }

    if ($this->input->post('religion') == '') {
      $data['inputerror'][] = 'religion';
      $data['error_string'][] = 'religion is required';
      $data['status'] = FALSE;
    }

    if ($this->input->post('tall') == '') {
      $data['inputerror'][] = 'tall';
      $data['error_string'][] = 'tall is required';
      $data['status'] = FALSE;
    }

    if ($this->input->post('weight') == '') {
      $data['inputerror'][] = 'weight';
      $data['error_string'][] = 'Weight is required';
      $data['status'] = FALSE;
    }

    if ($this->input->post('marital_status') == '') {
      $data['inputerror'][] = 'marital_status';
      $data['error_string'][] = 'marital_status is required';
      $data['status'] = FALSE;
    }
    if ($this->input->post('postal_code') == '') {
      $data['inputerror'][] = 'postal_code';
      $data['error_string'][] = 'postal_code is required';
      $data['status'] = FALSE;
    }

    if ($this->input->post('certificate') == '') {
      $data['inputerror'][] = 'certificate';
      $data['error_string'][] = 'certificate is required';
      $data['status'] = FALSE;
    }
    if ($this->input->post('validity_period') == '') {
      $data['inputerror'][] = 'validity_period';
      $data['error_string'][] = 'validity_period is required';
      $data['status'] = FALSE;
    }

    if ($this->input->post('status_test') == '') {
      $data['inputerror'][] = 'status_test';
      $data['error_string'][] = 'status_test is required';
      $data['status'] = FALSE;
    }

    if ($data['status'] === FALSE) {
      echo json_encode($data);
      exit();
    }
  }
}