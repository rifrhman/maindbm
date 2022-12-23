<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage extends CI_Controller
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
    $this->load->model('Manage_model', 'man');
  }

  public function index()
  {
    $data['title'] = "Candidate Basic - Super Admin";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $this->load->view('Temp_manage/header', $data);
    $this->load->view('Temp_manage/navbar', $data);
    $this->load->view('Temp_manage/sidebar', $data);
    $this->load->view('manage_index', $data);
    $this->load->view('Temp_manage/footer', $data);
  }

  public function candidate_basic_list()
  {
    $list = $this->man->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $person) {
      $no++;
      $row = array();
      $row[] = $person->id_candidate;
      $row[] = $person->fullname;
      $row[] = $person->domicile;
      $row[] = $person->date_of_birth;
      $row[] = $person->phone_number;

      //add html for action
      $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person(' . "'" . $person->id_candidate . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person(' . "'" . $person->id_candidate . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->man->count_all(),
      "recordsFiltered" => $this->man->count_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  }


  public function candidate_basic_edit($id_candidate)
  {
    $data = $this->man->get_by_id($id_candidate);
    $data->test_one = ($data->test_one == '0000-00-00') ? '' : $data->test_one; // if 0000-00-00 set tu empty for datepicker compatibility
    echo json_encode($data);
  }


  public function candidate_basic_update()
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
    $this->man->update(array('id_candidate' => $this->input->post('id_candidate')), $data);
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
    $this->man->save($data);
    echo json_encode(array("status" => TRUE));
  }

  public function candidate_basic_del($id_candidate)
  {
    $this->man->delete_by_id($id_candidate);
    echo json_encode(array("status" => TRUE));
  }


  private function _validate()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if ($this->input->post('fullname') == '') {
      $data['inputerror'][] = 'fullname';
      $data['error_string'][] = 'Fullname is required';
      $data['status'] = FALSE;
    }

    if ($this->input->post('place_of_birth') == '') {
      $data['inputerror'][] = 'place_of_birth';
      $data['error_string'][] = 'Place of Birth is required';
      $data['status'] = FALSE;
    }

    if ($this->input->post('date_of_birth') == '') {
      $data['inputerror'][] = 'date_of_birth';
      $data['error_string'][] = 'Date of Birth is required';
      $data['status'] = FALSE;
    }

    if ($this->input->post('domicile') == '') {
      $data['inputerror'][] = 'domicile';
      $data['error_string'][] = 'Domicile is required';
      $data['status'] = FALSE;
    }

    if ($this->input->post('phone_number') == '') {
      $data['inputerror'][] = 'phone_number';
      $data['error_string'][] = 'Phone Number is required';
      $data['status'] = FALSE;
    }

    if ($this->input->post('last_education') == '') {
      $data['inputerror'][] = 'last_education';
      $data['error_string'][] = 'Last Education is required';
      $data['status'] = FALSE;
    }

    if ($data['status'] === FALSE) {
      echo json_encode($data);
      exit();
    }
  }
}