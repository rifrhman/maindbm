<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
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

    $this->load->model('Employee_model', 'emp');
  }




  public function index()
  {
    // $id = $this->uri->segment(2);
    $data['title'] = "Karyawan Aktif";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['countNull'] = $this->emp->countJoinEmpNull();
    $data['list'] = $this->db->get('candidate_basic')->row_array();
    // $data['pk_add'] = $this->emp->getstat();

    $this->load->view('Temp_admin/header', $data);
    $this->load->view('Temp_admin/navbar', $data);
    $this->load->view('Temp_admin/sidebar', $data);
    $this->load->view('employee_view', $data);
    $this->load->view('Temp_admin/footer');
  }


  public function getDataScore()
  {

    $results = $this->emp->getDataTable();

    $data = [];
    $no = $_POST['start'];
    foreach ($results as $result) {
      $date1 = strtotime($result->end_of_contract);

      $dating = date("Y-m-d");
      $date2 = strtotime($dating);
      $res = ($date1 - $date2) / 60 / 60 / 24;
      $for = number_format($res, 0, '', '');
      $que = $this->emp->editstatPkwt($result->id_candidate);


      foreach ($que as $q) {
        $row = array();
        $row[] = ++$no;
        $row[] = $result->fullname;
        $row[] = $result->client;
        $row[] = $result->cc;
        $row[] = $result->position;
        $row[] = date('Y-m-d', strtotime($result->start_of_contract));
        $row[] = date('Y-m-d', strtotime($result->end_of_contract));
        $row[] = $for . " Hari";
        $row[] = '
          <a href="' . base_url('employee/detail_contract/') . $result->id_candidate . '"
    class="badge bg-gradient-blue btn-sm text-light"><i class="fas fa-fw fa-info-circle"></i> Info</a>
    <a href="' . base_url('employee/detail_pkwt/') . $result->id_candidate . '"
    class="badge bg-gradient-danger btn-sm text-light"><i class="fas fa-fw fa-folder-open"></i> PKWT</a><br>
    <a class="badge bg-gradient-indigo text-light" href="javascript:void(0)" title="Edit" onclick="edit_person(' . "'" . $q['id'] . "'" . ')"><i class="fas fa-fw fa-plus-circle"></i> Update Reminder</a>
    <a class="badge bg-gradient-gray text-light" href="javascript:void(0)" title="Add" onclick="add_person(' . "'" . $result->id_candidate . "'" . ')"><i class="fas fa-fw fa-plus-circle"></i> Addendum</a>';
        $data[] = $row;
      }
    }

    $output = array(
      'draw' => $_POST['draw'],
      'recordsTotal' => $this->emp->count_all_data(),
      'recordsFiltered' => $this->emp->count_filtered_data(),
      'data' => $data
    );

    $this->output->set_output(json_encode($output));
  }

  public function ajax_add()
  {
    $this->_validate();
    $data = array(
      'id' => $this->input->post('id'),
      'basic_id' => $this->input->post('basic_id'),
      'pkwt_number' => $this->input->post('pkwt_number'),
      'date_pkwt' => $this->input->post('date_pkwt'),
      'start_of_contract' => $this->input->post('start_of_contract'),
      'end_of_contract' => $this->input->post('end_of_contract'),
      'desc_pkwt' => $this->input->post('desc_pkwt'),
      'status_pkwt' => $this->input->post('status_pkwt'),
    );
    $this->emp->save(array('basic_id' => $this->input->post('basic_id')), $data);
    echo json_encode(array("status" => TRUE));
  }


  public function ajax_edit($id)
  {
    $data = $this->emp->get_by_id($id);
    // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
    echo json_encode($data);
  }

  public function ajax_add_id($basic_id)
  {
    $data = $this->emp->get_by_basic_id($basic_id);
    // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
    echo json_encode($data);
  }


  public function ajax_update()
  {
    $this->_validate();
    $data = array(
      'desc_pkwt' => $this->input->post('desc_pkwt'),
      'status_pkwt' => $this->input->post('status_pkwt'),
    );
    $this->emp->update(array('id' => $this->input->post('id')), $data);
    echo json_encode(array("status" => TRUE));
  }


  private function _validate()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if ($this->input->post('desc_pkwt') == '') {
      $data['inputerror'][] = 'desc_pkwt';
      $data['error_string'][] = 'Description is required';
      $data['status'] = FALSE;
    }

    if ($this->input->post('status_pkwt') == '') {
      $data['inputerror'][] = 'status_pkwt';
      $data['error_string'][] = 'Status is required';
      $data['status'] = FALSE;
    }

    if ($data['status'] === FALSE) {
      echo json_encode($data);
      exit();
    }
  }

  public function detail_contract($id_candidate)
  {
    $data['title'] = "Detail Karyawan";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['list'] = $this->emp->detailAll($id_candidate);
    $data['second'] = $this->emp->detailSecond($id_candidate);
    $data['educate'] = $this->emp->detailEducation($id_candidate);
    $data['exp'] = $this->emp->detailExp($id_candidate);
    $data['basicadmin'] = $this->emp->adminQuery($id_candidate);
    $data['secondadmin'] = $this->emp->adminBank($id_candidate);
    $data['emergency'] = $this->emp->emergencyContact($id_candidate);
    $data['detailEmergency'] = $this->emp->detailEmergency($id_candidate);
    $data['pkwt'] = $this->emp->pkwtEmployee($id_candidate);
    $data['pkwt_add'] = $this->emp->addendum($id_candidate);
    $data['statPkwt'] = $this->emp->statPkwt();

    $this->load->view('Temp_admin/header', $data);
    $this->load->view('Temp_admin/navbar', $data);
    $this->load->view('Temp_admin/sidebar', $data);
    $this->load->view('detail_employee', $data);
    $this->load->view('Temp_admin/footer');
  }

  public function detail_pkwt($id_candidate)
  {
    $data['title'] = "Detail Karyawan";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['list'] = $this->emp->detailAll($id_candidate);
    $data['second'] = $this->emp->detailSecond($id_candidate);
    $data['educate'] = $this->emp->detailEducation($id_candidate);
    $data['exp'] = $this->emp->detailExp($id_candidate);
    $data['basicadmin'] = $this->emp->adminQuery($id_candidate);
    $data['secondadmin'] = $this->emp->adminBank($id_candidate);
    $data['emergency'] = $this->emp->emergencyContact($id_candidate);
    $data['detailEmergency'] = $this->emp->detailEmergency($id_candidate);
    $data['pkwt'] = $this->emp->pkwtEmployee($id_candidate);
    $data['pkwt_add'] = $this->emp->addendum($id_candidate);

    $this->load->view('Temp_admin/header', $data);
    $this->load->view('Temp_admin/navbar', $data);
    $this->load->view('Temp_admin/sidebar', $data);
    $this->load->view('detail_pkwt', $data);
    $this->load->view('Temp_admin/footer');
  }
  public function editbasic($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['list'] = $this->emp->detailAll($id_candidate);
    $data['second'] = $this->emp->detailSecond($id_candidate);
    $data['educate'] = $this->emp->detailEducation($id_candidate);
    $data['exp'] = $this->emp->detailExp($id_candidate);

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
      $this->load->view('detail_employee', $data);
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
      $this->session->set_flashdata('msg', 'Data Basic Karyawan Berhasil Diubah');
      redirect('employee/detail_contract/' . $id_candidate);
    }
  }
  public function editsecondary($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    // $data['basic'] = $this->db->get('candidate_secondary', ['basic_id' => $basic_id])->row_array();

    $data['all'] = $this->emp->getAll($id_candidate);
    $data['list'] = $this->emp->detailAll($id_candidate);
    $data['second'] = $this->emp->detailSecond($id_candidate);
    $data['educate'] = $this->emp->detailEducation($id_candidate);
    $data['exp'] = $this->emp->detailExp($id_candidate);


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
      $this->load->view('Temp_admin/header', $data);
      $this->load->view('Temp_admin/navbar', $data);
      $this->load->view('Temp_admin/sidebar', $data);
      $this->load->view('detail_employee', $data);
      $this->load->view('Temp_admin/footer');
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
      $this->session->set_flashdata('msg', 'Data Secondary Karyawan Berhasil Diubah');
      redirect('employee/detail_contract/' . $id_candidate);
    }
  }

  public function addMoreDataEmp($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    // $data['basic'] = $this->db->get('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['list'] = $this->emp->detailAll($id_candidate);
    $data['second'] = $this->emp->detailSecond($id_candidate);
    $data['educate'] = $this->emp->detailEducation($id_candidate);
    $data['exp'] = $this->emp->detailExp($id_candidate);
    $data['basicadmin'] = $this->emp->adminQuery($id_candidate);

    $validation = $this->form_validation;

    $validation->set_rules('id_emp', 'Id Karyawan', 'required|trim');
    $validation->set_rules('id_privy', 'Id Privy', 'required|trim');
    $validation->set_rules('cc', 'cc', 'required|trim');
    $validation->set_rules('branch_company', 'Branch Company', 'required|trim');
    $validation->set_rules('payroll_one', 'payroll_one', 'required|trim');
    $validation->set_rules('payroll_two', 'payroll_two', 'required|trim');
    $validation->set_rules('blood_type', 'blood_type', 'required|trim');
    $validation->set_rules('address_ktp', 'address_ktp', 'required|trim');
    $validation->set_rules('postal_code_ktp', 'postal_code_ktp', 'required|trim');
    $validation->set_rules('no_kk', 'no_kk', 'required|trim');
    $validation->set_rules('status_company', 'status_company', 'required|trim');
    $validation->set_rules('surrogate_status', 'surrogate_status', 'required|trim');
    $validation->set_rules('type_recruitment', 'type_recruitment', 'required|trim');

    if ($validation->run() == false) {
      $this->load->view('Temp_admin/header', $data);
      $this->load->view('Temp_admin/navbar', $data);
      $this->load->view('Temp_admin/sidebar', $data);
      $this->load->view('detail_employee', $data);
      $this->load->view('Temp_admin/footer');
    } else {
      $data = [
        "id_emp" => $this->input->post('id_emp'),
        "id_privy" => $this->input->post('id_privy'),
        "cc" => $this->input->post('cc'),
        "branch_company" => $this->input->post('branch_company'),
        "payroll_one" => $this->input->post('payroll_one'),
        "payroll_two" => $this->input->post('payroll_two'),
        "blood_type" => $this->input->post('blood_type'),
        "address_ktp" => $this->input->post('address_ktp'),
        "postal_code_ktp" => $this->input->post('postal_code_ktp'),
        "no_kk" => $this->input->post('no_kk'),
        "status_company" => $this->input->post('status_company'),
        "surrogate_status" => $this->input->post('surrogate_status'),
        "type_recruitment" => $this->input->post('type_recruitment'),
        "basic_id" => $this->input->post('basic_id')
      ];

      $que = "SELECT * FROM basic_admin WHERE basic_id = $id_candidate";
      if ($que) {

        $id_emp = $this->input->post('id_emp');
        $id_privy = $this->input->post('id_privy');
        $cc = $this->input->post('cc');
        $branch_company = $this->input->post('branch_company');
        $payroll_one = $this->input->post('payroll_one');
        $payroll_two = $this->input->post('payroll_two');
        $blood_type = $this->input->post('blood_type');
        $address_ktp = $this->input->post('address_ktp');
        $postal_code_ktp = $this->input->post('postal_code_ktp');
        $no_kk = $this->input->post('no_kk');
        $status_company = $this->input->post('status_company');
        $surrogate_status = $this->input->post('surrogate_status');
        $type_recruitment = $this->input->post('type_recruitment');

        $this->db->set('id_emp', $id_emp);
        $this->db->set('id_privy', $id_privy);
        $this->db->set('cc', $cc);
        $this->db->set('branch_company', $branch_company);
        $this->db->set('payroll_one', $payroll_one);
        $this->db->set('payroll_two', $payroll_two);
        $this->db->set('blood_type', $blood_type);
        $this->db->set('address_ktp', $address_ktp);
        $this->db->set('postal_code_ktp', $postal_code_ktp);
        $this->db->set('no_kk', $no_kk);
        $this->db->set('status_company', $status_company);
        $this->db->set('surrogate_status', $surrogate_status);
        $this->db->set('type_recruitment', $type_recruitment);
        $this->db->where('basic_id', $this->input->post('basic_id'));
        $this->db->update('basic_admin');

        $this->session->set_flashdata('msg', 'Data Tambahan Karyawan Berhasil Diubah');
        redirect('employee/detail_contract/' . $id_candidate);
      } else {
        $this->db->insert('basic_admin', $data);
        $this->session->set_flashdata('msg', 'Data Tambahan Karyawan berhasil Ditambah');
        redirect('employee/detail_contract/' . $id_candidate);
      }
    }
  }

  public function addDataEmergency($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['emer'] = $this->db->get('emergency_contact')->result_array();

    $validation = $this->form_validation;

    $validation->set_rules('name_emergency', 'Emergency Name', 'required|trim');
    $validation->set_rules('phone_emergency', 'Emergency Phone Number', 'required|trim');
    $validation->set_rules('relation_emergency', 'Relation Emergency', 'required|trim');

    if ($validation->run() == false) {
      $this->load->view('Temp_admin/header', $data);
      $this->load->view('Temp_admin/navbar', $data);
      $this->load->view('Temp_admin/sidebar', $data);
      $this->load->view('detail_employee', $data);
      $this->load->view('Temp_admin/footer');
    } else {

      $data = [
        'name_emergency' => $this->input->post('name_emergency'),
        'phone_emergency' => $this->input->post('phone_emergency'),
        'relation_emergency' => $this->input->post('relation_emergency'),
        'basic_id' => $id_candidate
      ];

      $this->db->insert('emergency_contact', $data);
      $this->session->set_flashdata('msg', 'Data Emergency berhasil ditambah.');
      redirect('employee/detail_contract/' . $id_candidate);
    }
  }

  public function addPkwtEmployee($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['pkwt'] = $this->db->get('pkwt_employee')->result_array();

    $validation = $this->form_validation;

    $validation->set_rules('pkwt_number', 'No PKWT', 'required|trim');
    $validation->set_rules('date_pkwt', 'Date PKWT', 'required|trim');
    $validation->set_rules('start_of_contract', 'StartOf PKWT', 'required|trim');
    $validation->set_rules('end_of_contract', 'EndOf PKWT', 'required|trim');
    $validation->set_rules('desc_pkwt', 'Desc PKWT', 'required|trim');
    $validation->set_rules('status_pkwt', 'Status PKWT', 'required|trim');

    if ($validation->run() == false) {
      $this->load->view('Temp_admin/header', $data);
      $this->load->view('Temp_admin/navbar', $data);
      $this->load->view('Temp_admin/sidebar', $data);
      $this->load->view('detail_employee', $data);
      $this->load->view('Temp_admin/footer');
    } else {

      $data = [
        'pkwt_number' => $this->input->post('pkwt_number'),
        'date_pkwt' => $this->input->post('date_pkwt'),
        'start_of_contract' => $this->input->post('start_of_contract'),
        'end_of_contract' => $this->input->post('end_of_contract'),
        'desc_pkwt' => $this->input->post('desc_pkwt'),
        'status_pkwt' => $this->input->post('status_pkwt'),
        'basic_id' => $id_candidate
      ];

      $id = $this->db->insert('pkwt_employee', $data);

      if ($id) {
        $confirm_admin = $this->input->post('confirm_admin');
        $this->db->set('confirm_admin', $confirm_admin);
        $this->db->where('basic_id', $id_candidate);
        $new_data = $this->db->update('send_candidate');
        if ($new_data) {
          $this->session->set_flashdata('msg', 'Data PKWT berhasil ditambah');
          redirect('employee/detail_contract/' . $id_candidate);
        } else {
          $this->session->set_flashdata('msg', 'Data PKWT gagal ditambah');
          redirect('employee/detail_contract/' . $id_candidate);
        }
      }
    }
  }

  public function update_status_file($id)
  {
    $data['title'] = "Update PKWT Status";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    // $data['basic'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['pkwt'] = $this->db->get('pkwt_employee')->row_array();
    $data['status'] = $this->db->get('pkwt_employee')->row_array();


    $validation = $this->form_validation;

    $validation->set_rules('status_pkwt', 'Status PKWT', 'required');

    if ($validation->run() == false) {
      $this->load->view('Temp_admin/header', $data);
      $this->load->view('Temp_admin/navbar', $data);
      $this->load->view('Temp_admin/sidebar', $data);
      $this->load->view('detail_pkwt', $data);
      $this->load->view('Temp_admin/footer');
    } else {

      $status_pkwt = $this->input->post('status_pkwt');

      $this->db->set('status_pkwt', $status_pkwt);
      $this->db->where('id', $this->input->post('id'));

      $this->db->update('pkwt_employee');
      $this->session->set_flashdata('msg', 'Status berhasil di update');
      redirect('employee');
    }
  }

  public function resign_employee($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['res'] = $this->db->get('resign_employee')->result_array();

    $validation = $this->form_validation;

    $validation->set_rules('work_end_date', 'Work End Date', 'required|trim');
    $validation->set_rules('date_resign', 'Date Resign', 'required|trim');
    $validation->set_rules('desc_resign', 'Desc Resign', 'required|trim');
    $validation->set_rules('resign_status', 'Status Resign', 'required|trim');
    $validation->set_rules('flags_resign', 'Flags Resign', 'required|trim');

    if ($validation->run() == false) {
      $this->load->view('Temp_admin/header', $data);
      $this->load->view('Temp_admin/navbar', $data);
      $this->load->view('Temp_admin/sidebar', $data);
      $this->load->view('detail_employee', $data);
      $this->load->view('Temp_admin/footer');
    } else {
      $data = [
        'work_end_date' => $this->input->post('work_end_date'),
        'date_resign' => $this->input->post('date_resign'),
        'desc_resign' => $this->input->post('desc_resign'),
        'resign_status' => $this->input->post('resign_status'),
        'basic_id' => $id_candidate
      ];

      $id = $this->db->insert('resign_employee', $data);
      if ($id) {
        $confirm_resign = $this->input->post('flags_resign');
        $this->db->set('flags_resign', $confirm_resign);
        $this->db->where('basic_id', $id_candidate);
        $new_data = $this->db->update('pkwt_employee');
        if ($new_data) {
          $this->session->set_flashdata('msg', 'Data Resign berhasil ditambah');
          redirect('employee/detail_contract/' . $id_candidate);
        } else {
          $this->session->set_flashdata('msg', 'Data Resign gagal ditambah');
          redirect('employee/detail_contract/' . $id_candidate);
        }
      }
    }
  }
}