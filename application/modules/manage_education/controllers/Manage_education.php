<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_education extends CI_Controller
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
    $this->load->model('Manage_education_model', 'mandu');
  }

  public function index()
  {
    $data['title'] = "Education - Super Admin";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $this->load->view('Temp_manage/header', $data);
    $this->load->view('Temp_manage/navbar', $data);
    $this->load->view('Temp_manage/sidebar', $data);
    $this->load->view('manage_education_index', $data);
    $this->load->view('Temp_manage/footer', $data);
  }


  public function education_list()
  {
    $list = $this->mandu->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $person) {
      $no++;
      $row = array();
      $row[] = $person->id_candidate;
      $row[] = $person->fullname;
      $row[] = $person->degree;
      $row[] = $person->institute;
      $row[] = $person->city;

      //add html for action
      $row[] = '<a href="' . base_url('manage_education/detail_education/') . $person->basic_id . '" class="btn bg-purple btn-sm"><i class="fas fa-fw fa-user-graduate"></i> Detail</a>';

      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->mandu->count_all(),
      "recordsFiltered" => $this->mandu->count_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  }

  public function detail_education($basic_id)
  {
    $data['title'] = "Education Detail - Super Admin";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['edu'] = $this->mandu->getDetailEducation($basic_id);
    $data['educate'] = $this->mandu->getDetailEdu($basic_id);

    $this->load->view('Temp_manage/header', $data);
    $this->load->view('Temp_manage/navbar', $data);
    $this->load->view('Temp_manage/sidebar', $data);
    $this->load->view('manage_education_detail', $data);
    $this->load->view('Temp_manage/footer', $data);
  }

  // public function edit_edu($id_education)
  // {
  //   $data['title'] = "Kontrak Form Kandidat";
  //   $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
  //   $data['educ'] = $this->mandu->getEducation($id_education);
  //   $data['candidate'] = $this->db->get('education');

  //   $validation = $this->form_validation;

  //   $validation->set_rules('client', 'Client', 'required|trim');
  //   $validation->set_rules('position', 'Position', 'required|trim');


  //   if ($validation->run() == false) {
  //     $this->load->view('Temp_admin/header', $data);
  //     $this->load->view('Temp_admin/navbar', $data);
  //     $this->load->view('Temp_admin/sidebar', $data);
  //     $this->load->view('detail_contract_view', $data);
  //     $this->load->view('Temp_admin/footer');
  //   } else {
  //     $client = $this->input->post('client');
  //     $position = $this->input->post('position');



  //     $this->db->set('client', $client);
  //     $this->db->set('position', $position);

  //     $this->db->where('id', $this->input->post('id'));
  //     $this->db->update('send_candidate');
  //     $this->session->set_flashdata('msg', 'Edit Data berhasil');
  //     $url = $_SERVER['HTTP_REFERER'];
  //     redirect($url);
  //   }
  // }


  public function edu_edit($id_education)
  {
    $data = $this->mandu->get_by_id($id_education);
    // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
    echo json_encode($data);
  }

  public function edu_update()
  {
    // $this->_validate();
    $data = array(
      'degree' => $this->input->post('degree'),
      'institute' => $this->input->post('institute'),
      'major' => $this->input->post('major'),
      'city' => $this->input->post('city'),
      'score' => $this->input->post('score'),
      'year_in_edu' => $this->input->post('year_in_edu'),
      'year_out_edu' => $this->input->post('year_out_edu'),
      'basic_id' => $this->input->post('basic_id'),
    );
    $this->mandu->update(array('id_education' => $this->input->post('id_education')), $data);
    echo json_encode(array("status" => TRUE));
  }

  public function edu_delete($id_education)
  {
    $this->mandu->delete_by_id($id_education);
    echo json_encode(array("status" => TRUE));
  }
}