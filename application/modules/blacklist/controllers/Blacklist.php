<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blacklist extends CI_Controller
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
    $this->load->model('blacklist_model', 'res');
  }

  public function index()
  {
    $data['title'] = "Karyawan Blacklist";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['list'] = $this->db->get('candidate_basic')->row_array();

    $this->load->view('Temp_admin/header', $data);
    $this->load->view('Temp_admin/navbar', $data);
    $this->load->view('Temp_admin/sidebar', $data);
    $this->load->view('blacklist_view', $data);
    $this->load->view('Temp_admin/footer');
  }

  public function getDataScore()
  {

    $results = $this->res->getDataTable();

    $data = [];
    $no = $_POST['start'];
    foreach ($results as $result) {

      $row = array();
      $row[] = ++$no;
      $row[] = $result->fullname;
      $row[] = $result->client;
      $row[] = date('Y-m-d', strtotime($result->date_resign));
      $row[] = $result->desc_resign;
      $row[] = $result->resign_status;
      $row[] = '
          <a href="' . base_url('blacklist/detail_blacklist/') . $result->id_candidate . '"
    class="badge bg-gradient-blue btn-sm text-light"><i class="fas fa-fw fa-info-circle"></i> Info</a>';
      $data[] = $row;
    }

    $output = array(
      'draw' => $_POST['draw'],
      'recordsTotal' => $this->res->count_all_data(),
      'recordsFiltered' => $this->res->count_filtered_data(),
      'data' => $data
    );

    $this->output->set_output(json_encode($output));
  }


  public function detail_blacklist($id_candidate)
  {
    $data['title'] = "Detail Karyawan";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['list'] = $this->res->detailAll($id_candidate);
    $data['second'] = $this->res->detailSecond($id_candidate);
    $data['educate'] = $this->res->detailEducation($id_candidate);
    $data['exp'] = $this->res->detailExp($id_candidate);
    $data['basicadmin'] = $this->res->adminQuery($id_candidate);
    $data['secondadmin'] = $this->res->adminBank($id_candidate);
    $data['emergency'] = $this->res->emergencyContact($id_candidate);
    $data['detailEmergency'] = $this->res->detailEmergency($id_candidate);
    $data['pkwt'] = $this->res->pkwtEmployee($id_candidate);
    $data['pkwt_add'] = $this->res->addendum($id_candidate);
    $data['statPkwt'] = $this->res->statPkwt();

    $this->load->view('Temp_admin/header', $data);
    $this->load->view('Temp_admin/navbar', $data);
    $this->load->view('Temp_admin/sidebar', $data);
    $this->load->view('detail_employee_blacklist', $data);
    $this->load->view('Temp_admin/footer');
  }
}