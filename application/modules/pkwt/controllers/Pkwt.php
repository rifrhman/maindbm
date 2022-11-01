<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pkwt extends CI_Controller
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

    $this->load->model('Pkwt_model', 'pk_model');
  }

  public function index()
  {
    $data['title'] = "PKWT Karyawan";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    // $data['countNull'] = $this->emp->countJoinEmpNull();
    $this->load->view('Temp_admin/header', $data);
    $this->load->view('Temp_admin/navbar', $data);
    $this->load->view('Temp_admin/sidebar', $data);
    $this->load->view('pkwt_view', $data);
    $this->load->view('Temp_admin/footer');
  }

  public function getDataScore()
  {
    // header('Content-Type: application/json');

    $results = $this->pk_model->getDataTable();

    $data = [];
    $no = $_POST['start'];
    foreach ($results as $result) {
      $row = array();
      $row[] = ++$no;
      $row[] = $result->fullname;
      $row[] = $result->client;
      $row[] = $result->pkwt_number;
      $row[] = $result->date_pkwt;
      $row[] = date('d-M-Y', strtotime($result->start_of_contract)) . ' - ' . date('d-M-Y', strtotime($result->end_of_contract));
      $row[] = $result->desc_pkwt;
      $row[] = $result->status_pkwt;
      $data[] = $row;
    }

    $output = array(
      'draw' => $_POST['draw'],
      'recordsTotal' => $this->pk_model->count_all_data(),
      'recordsFiltered' => $this->pk_model->count_filtered_data(),
      'data' => $data
    );

    $this->output->set_output(json_encode($output));
  }

  public function exportExcel()
  {
    $data['title'] = "Laporan PKWT Karyawan";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $data['all'] = $this->pk_model->queryDataExport();

    $this->load->view('exportexcel/data_pkwt', $data);
  }
}