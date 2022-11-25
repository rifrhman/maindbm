<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dropout extends CI_Controller
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
    $this->load->model('Dropout_model', 'drop');
  }

  public function index()
  {
    $data['title'] = "Karyawan Keluar";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    // $data['countNull'] = $this->con->countJoinEmpNull();
    $this->load->view('Temp_admin/header', $data);
    $this->load->view('Temp_admin/navbar', $data);
    $this->load->view('Temp_admin/sidebar', $data);
    $this->load->view('dropout_view', $data);
    $this->load->view('Temp_admin/footer');
  }

  public function getDataScore()
  {

    $results = $this->drop->getDataTable();

    $data = [];
    $no = $_POST['start'];
    foreach ($results as $result) {


      $row = array();
      $row[] = ++$no;
      $row[] = $result->fullname;
      $row[] = $result->client;
      $row[] = $result->cc;
      $row[] = $result->position;
      $row[] = date('Y-m-d', strtotime($result->start_of_contract));
      $row[] = date('Y-m-d', strtotime($result->end_of_contract));
      $row[] = '
        <a class="badge bg-danger" href="javascript:void(0)" title="Edit Out Karyawan" onclick="out_emp(' . "'" . $result->id_candidate . "'" . ')"><i class="fas fa-fw fa-share"></i> OUT</a>';
      $data[] = $row;
    }


    $output = array(
      'draw' => $_POST['draw'],
      'recordsTotal' => $this->drop->count_all_data(),
      'recordsFiltered' => $this->drop->count_filtered_data(),
      'data' => $data
    );

    $this->output->set_output(json_encode($output));
  }

  public function out_emp($basic_id)
  {
    $data = $this->drop->get_by_basic_id($basic_id);
    // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu signty for datepicker compatibility
    echo json_encode($data);
  }

  public function update_out()
  {
    $this->_validate();
    $data = array(
      'flags_resign' => $this->input->post('flags_resign'),
    );
    $this->drop->update(array('basic_id' => $this->input->post('basic_id')), $data);
    echo json_encode(array("status" => TRUE));
  }

  private function _validate()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if ($this->input->post('flags_resign') == '') {
      $data['inputerror'][] = 'flags_resign';
      $data['error_string'][] = 'Flags Resign is required';
      $data['status'] = FALSE;
    }
    if ($data['status'] === FALSE) {
      echo json_encode($data);
      exit();
    }
  }

  //export ke dalam format excel
  public function export_excel()
  {
    $data['title'] = "Karyawan Keluar (OUT)";
    $data['in'] = $this->drop->quer();

    $this->load->view('export_out', $data);
  }
}