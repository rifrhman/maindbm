<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signin extends CI_Controller
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

    $this->load->model('Signin_model', 'sign');
  }

  public function index()
  {
    $data['title'] = "Karyawan Masuk";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    // $data['countNull'] = $this->con->countJoinEmpNull();
    $this->load->view('Temp_admin/header', $data);
    $this->load->view('Temp_admin/navbar', $data);
    $this->load->view('Temp_admin/sidebar', $data);
    $this->load->view('signin_view', $data);
    $this->load->view('Temp_admin/footer');
  }


  public function getDataScore()
  {

    $results = $this->sign->getDataTable();

    $data = [];
    $no = $_POST['start'];
    foreach ($results as $result) {
      // $date1 = strtotime($result->end_of_contract);

      // $dating = date("Y-m-d");
      // $date2 = strtotime($dating);
      // $res = ($date1 - $date2) / 60 / 60 / 24;
      // $for = number_format($res, 0, '', '');
      // $que = $this->emp->editstatPkwt($result->id_candidate);


      // foreach ($que as $q) {
      if ($result->is_join) {
      } else {
        $row = array();
        $row[] = ++$no;
        $row[] = $result->fullname;
        $row[] = $result->client;
        $row[] = $result->cc;
        $row[] = $result->position;
        $row[] = date('Y-m-d', strtotime($result->start_of_contract));
        $row[] = date('Y-m-d', strtotime($result->end_of_contract));
        $row[] = '
              
        <a class="badge bg-gradient-danger text-light" href="javascript:void(0)" title="Edit Join" onclick="edit_join(' . "'" . $result->id_candidate . "'" . ')"><i class="fas fa-fw fa-map-pin"></i>JOIN</a>';
        $data[] = $row;
      }
    }
    // }

    $output = array(
      'draw' => $_POST['draw'],
      'recordsTotal' => $this->sign->count_all_data(),
      'recordsFiltered' => $this->sign->count_filtered_data(),
      'data' => $data
    );

    $this->output->set_output(json_encode($output));
  }

  public function join_edit($basic_id)
  {
    $data = $this->sign->get_by_basic_id($basic_id);
    // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu signty for datepicker compatibility
    echo json_encode($data);
  }

  public function update_join()
  {
    $this->_validate();
    $data = array(
      'confirm' => $this->input->post('confirm'),
      'confirm_admin' => $this->input->post('confirm_admin'),
      'is_join' => $this->input->post('is_join'),
    );
    $this->sign->update(array('basic_id' => $this->input->post('basic_id')), $data);
    echo json_encode(array("status" => TRUE));
  }

  private function _validate()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if ($this->input->post('is_join') == '') {
      $data['inputerror'][] = 'is_join';
      $data['error_string'][] = 'Join is required';
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
    $data['title'] = "Karyawan JOIN (IN)";
    $data['in'] = $this->sign->quer();

    $this->load->view('export_in', $data);
  }
}