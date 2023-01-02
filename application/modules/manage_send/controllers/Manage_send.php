<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_send extends CI_Controller
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
    $this->load->model('Manage_send_model', 'man_send');
  }

  public function index()
  {
    $data['title'] = "Candidate Send - Super Admin";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $this->load->view('temp_manage/header', $data);
    $this->load->view('temp_manage/navbar', $data);
    $this->load->view('temp_manage/sidebar', $data);
    $this->load->view('manage_send_index', $data);
    $this->load->view('temp_manage/footer');
  }

  public function candidate_send_list()
  {
    $list = $this->man_send->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $person) {
      $no++;
      $row = array();
      $row[] = $person->basic_id;
      $row[] = $person->fullname;
      $row[] = $person->client;
      $row[] = $person->position;
      $row[] = $person->placement;
      $row[] = $person->created_by;
      $row[] = $person->result_send;

      //add html for action
      $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_secondary(' . "'" . $person->basic_id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_secondary(' . "'" . $person->basic_id . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->man_send->count_all(),
      "recordsFiltered" => $this->man_send->count_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  }
}