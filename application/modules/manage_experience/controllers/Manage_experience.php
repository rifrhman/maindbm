<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_experience extends CI_Controller
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
    $this->load->model('Manage_experience_model', 'manex');
  }

  public function index()
  {
    $data['title'] = "Experience - Super Admin";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $this->load->view('Temp_manage/header', $data);
    $this->load->view('Temp_manage/navbar', $data);
    $this->load->view('Temp_manage/sidebar', $data);
    $this->load->view('manage_experience_index', $data);
    $this->load->view('Temp_manage/footer', $data);
  }


  public function experience_list()
  {
    $list = $this->manex->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $person) {
      $no++;
      $row = array();
      $row[] = $person->id_candidate;
      $row[] = $person->fullname;
      $row[] = $person->company;
      $row[] = $person->month_period;
      $row[] = $person->resign;

      //add html for action
      $row[] = '<a href="' . base_url('manage_experience/detail_experience/') . $person->basic_id . '" class="btn bg-lime btn-sm"><i class="fas fa-fw fa-briefcase"></i> Detail</a>';

      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->manex->count_all(),
      "recordsFiltered" => $this->manex->count_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  }

  public function detail_experience($basic_id)
  {
    $data['title'] = "Experience Detail - Super Admin";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['exp'] = $this->manex->getDetailExperience($basic_id);
    $data['expert'] = $this->manex->getDetailExp($basic_id);

    $this->load->view('Temp_manage/header', $data);
    $this->load->view('Temp_manage/navbar', $data);
    $this->load->view('Temp_manage/sidebar', $data);
    $this->load->view('manage_experience_detail', $data);
    $this->load->view('Temp_manage/footer', $data);
  }

  public function exp_edit($id_exp)
  {
    $data = $this->manex->get_by_id($id_exp);
    // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
    echo json_encode($data);
  }

  public function exp_update()
  {
    // $this->_validate();
    $data = array(
      'company' => $this->input->post('company'),
      'position_exp' => $this->input->post('position_exp'),
      'year_in_exp' => $this->input->post('year_in_exp'),
      'month_period' => $this->input->post('month_period'),
      'last_salary' => $this->input->post('last_salary'),
      'resign' => $this->input->post('resign'),
    );
    $this->manex->update(array('id_exp' => $this->input->post('id_exp')), $data);
    echo json_encode(array("status" => TRUE));
  }

  public function del_experience($id_exp)
  {
    $this->manex->delete_by_id($id_exp);
    echo json_encode(array("status" => TRUE));
  }
}