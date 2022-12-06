<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contract extends CI_Controller
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
    $this->load->model('Contract_model', 'con');
  }

  public function index()
  {
    $data['title'] = "Join Kontrak";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['countNull'] = $this->con->countJoinEmpNull();
    $this->load->view('Temp_admin/header', $data);
    $this->load->view('Temp_admin/navbar', $data);
    $this->load->view('Temp_admin/sidebar', $data);
    $this->load->view('contract_view', $data);
    $this->load->view('Temp_admin/footer');
  }
  public function getDataScore()
  {
    // header('Content-Type: application/json');

    $results = $this->con->getDataTable();

    $data = [];
    $no = $_POST['start'];
    foreach ($results as $result) {
      $row = array();
      $row[] = ++$no;
      $row[] = $result->fullname;
      $row[] = $result->client;
      $row[] = $result->position;
      $row[] = $result->start_date . ' - ' . $result->end_date;
      $row[] = $result->created_by;
      $row[] = '
      <a href="' . base_url('contract/detail_contract/') . $result->id_candidate . '"
class="btn bg-gradient-blue btn-sm text-light"><i class="fas fa-fw fa-info"></i> Detail</a><br>';
      $data[] = $row;
    }

    $output = array(
      'draw' => $_POST['draw'],
      'recordsTotal' => $this->con->count_all_data(),
      'recordsFiltered' => $this->con->count_filtered_data(),
      'data' => $data
    );

    $this->output->set_output(json_encode($output));
  }

  public function detail_contract($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['list'] = $this->con->detailAll($id_candidate);
    $data['second'] = $this->con->detailSecond($id_candidate);
    $data['educate'] = $this->con->detailEducation($id_candidate);
    $data['exp'] = $this->con->detailExp($id_candidate);
    $data['basicadmin'] = $this->con->adminQuery($id_candidate);
    $data['secondadmin'] = $this->con->adminBank($id_candidate);
    $data['can_send'] = $this->con->getSendCandidate($id_candidate);

    $data['emergency'] = $this->con->emergencyContact($id_candidate);
    $data['detailEmergency'] = $this->con->detailEmergency($id_candidate);
    $data['pkwt'] = $this->con->pkwtEmployee($id_candidate);


    $this->load->view('Temp_admin/header', $data);
    $this->load->view('Temp_admin/navbar', $data);
    $this->load->view('Temp_admin/sidebar', $data);
    $this->load->view('detail_contract_view', $data);
    $this->load->view('Temp_admin/footer');
  }

  public function editbasic($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['list'] = $this->con->detailAll($id_candidate);
    $data['second'] = $this->con->detailSecond($id_candidate);
    $data['educate'] = $this->con->detailEducation($id_candidate);
    $data['exp'] = $this->con->detailExp($id_candidate);

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
      $this->load->view('detail_contract_view', $data);
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
      $this->session->set_flashdata('msg', 'Edit Data Basic berhasil');
      redirect('contract/detail_contract/' . $id_candidate);
    }
  }

  public function edit_send($id)
  {
    $data['title'] = "Kontrak Form Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['status'] = $this->db->get_where('send_candidate', ['id' => $id])->row_array();
    $data['candidate'] = $this->db->get('candidate_basic');

    $validation = $this->form_validation;

    $validation->set_rules('client', 'Client', 'required|trim');
    $validation->set_rules('position', 'Position', 'required|trim');
    $validation->set_rules('date_send', 'Date Send', 'required|trim');
    $validation->set_rules('result_send', 'Result Send', 'required|trim');
    $validation->set_rules('placement', 'Placement', 'required|trim');
    $validation->set_rules('salary', 'Salary', 'required|trim');
    $validation->set_rules('start_date', 'Start At', 'required|trim');
    $validation->set_rules('end_date', 'End At', 'required|trim');
    $validation->set_rules('desc_send', 'Description Send Candidate', 'required|trim');

    if ($validation->run() == false) {
      $this->load->view('Temp_admin/header', $data);
      $this->load->view('Temp_admin/navbar', $data);
      $this->load->view('Temp_admin/sidebar', $data);
      $this->load->view('detail_contract_view', $data);
      $this->load->view('Temp_admin/footer');
    } else {
      $client = $this->input->post('client');
      $position = $this->input->post('position');
      $date_send = $this->input->post('date_send');
      $result_send = $this->input->post('result_send');
      $placement = $this->input->post('placement');
      $salary = $this->input->post('salary');
      $start_date = $this->input->post('start_date');
      $end_date = $this->input->post('end_date');
      $desc_send = $this->input->post('desc_send');


      $this->db->set('client', $client);
      $this->db->set('position', $position);
      $this->db->set('date_send', $date_send);
      $this->db->set('result_send', $result_send);
      $this->db->set('placement', $placement);
      $this->db->set('salary', $salary);
      $this->db->set('start_date', $start_date);
      $this->db->set('end_date', $end_date);
      $this->db->set('desc_send', $desc_send);
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('send_candidate');
      $this->session->set_flashdata('msg', 'Edit Data berhasil');
      $url = $_SERVER['HTTP_REFERER'];
      redirect($url);
    }
  }


  public function editsecondary($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    // $data['basic'] = $this->db->get('candidate_secondary', ['basic_id' => $basic_id])->row_array();

    $data['all'] = $this->con->getAll($id_candidate);
    $data['list'] = $this->con->detailAll($id_candidate);
    $data['second'] = $this->con->detailSecond($id_candidate);
    $data['educate'] = $this->con->detailEducation($id_candidate);
    $data['exp'] = $this->con->detailExp($id_candidate);


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
      $this->load->view('detail_contract_view', $data);
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
      $this->session->set_flashdata('msg', 'Edit Data Secondary berhasil');
      redirect('contract/detail_contract/' . $id_candidate);
    }
  }

  public function addMoreDataEmp($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    // $data['basic'] = $this->db->get('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['list'] = $this->con->detailAll($id_candidate);
    $data['second'] = $this->con->detailSecond($id_candidate);
    $data['educate'] = $this->con->detailEducation($id_candidate);
    $data['exp'] = $this->con->detailExp($id_candidate);
    $data['basicadmin'] = $this->con->adminQuery($id_candidate);

    $validation = $this->form_validation;

    $validation->set_rules('id_emp', 'Id Karyawan', 'required');
    $validation->set_rules('id_privy', 'Id Privy', 'required');
    $validation->set_rules('cc', 'cc', 'required');
    $validation->set_rules('branch_company', 'Branch Company', 'required');
    $validation->set_rules('payroll_one', 'payroll_one', 'required');
    $validation->set_rules('payroll_two', 'payroll_two', 'required');
    $validation->set_rules('blood_type', 'blood_type', 'required');
    $validation->set_rules('address_ktp', 'address_ktp', 'required');
    $validation->set_rules('postal_code_ktp', 'postal_code_ktp', 'required');
    $validation->set_rules('no_kk', 'no_kk', 'required');
    $validation->set_rules('status_company', 'status_company', 'required');
    $validation->set_rules('surrogate_status', 'surrogate_status', 'required');
    $validation->set_rules('type_recruitment', 'type_recruitment', 'required');

    if ($validation->run() == false) {
      $this->load->view('Temp_admin/header', $data);
      $this->load->view('Temp_admin/navbar', $data);
      $this->load->view('Temp_admin/sidebar', $data);
      $this->load->view('detail_contract_view', $data);
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
        "basic_id" => $id_candidate
      ];

      $que = $this->con->get_basic_admin($id_candidate);
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
        $this->db->where('basic_id', $id_candidate);
        $this->db->update('basic_admin');

        $this->session->set_flashdata('msg', 'Data Tambahan Sudah berhasil Di Edit');
        redirect('contract/detail_contract/' . $id_candidate);
      } else {
        $this->db->insert('basic_admin', $data);
        $this->session->set_flashdata('msg', 'Data Tambahan Karyawan berhasil Ditambah');
        redirect('contract/detail_contract/' . $id_candidate);
      }
    }
  }

  public function addBankData($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    // $data['basic'] = $this->db->get('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['list'] = $this->con->detailAll($id_candidate);
    $data['second'] = $this->con->detailSecond($id_candidate);
    $data['educate'] = $this->con->detailEducation($id_candidate);
    $data['exp'] = $this->con->detailExp($id_candidate);
    $data['basicadmin'] = $this->con->adminQuery($id_candidate);
    $data['secondadmin'] = $this->con->adminBank($id_candidate);

    $validation = $this->form_validation;

    $validation->set_rules('allowance_premium', 'Allowance Premium', 'required|trim');
    $validation->set_rules('allowance_others', 'Allowance Others', 'required|trim');
    $validation->set_rules('placement_city', 'Placement City', 'required|trim');
    $validation->set_rules('placement_district', 'Placement District', 'required|trim');
    $validation->set_rules('type_bank', 'BANK', 'required|trim');
    $validation->set_rules('account_number', 'Number Account', 'required|trim');
    $validation->set_rules('name_of_bank', 'Name Of Bank', 'required|trim');
    $validation->set_rules('bpjs_tk', 'BPJS TK', 'required|trim');
    $validation->set_rules('bpjs_ks', 'BPJS KS', 'required|trim');
    $validation->set_rules('npwp', 'NPWP', 'required|trim');


    if ($validation->run() == false) {
      $this->load->view('Temp_admin/header', $data);
      $this->load->view('Temp_admin/navbar', $data);
      $this->load->view('Temp_admin/sidebar', $data);
      $this->load->view('detail_contract_view', $data);
      $this->load->view('Temp_admin/footer');
    } else {
      $data = [
        "allowance_premium" => $this->input->post('allowance_premium'),
        "allowance_others" => $this->input->post('allowance_others'),
        "placement_city" => $this->input->post('placement_city'),
        "placement_district" => $this->input->post('placement_district'),
        "type_bank" => $this->input->post('type_bank'),
        "account_number" => $this->input->post('account_number'),
        "name_of_bank" => $this->input->post('name_of_bank'),
        "bpjs_tk" => $this->input->post('bpjs_tk'),
        "bpjs_ks" => $this->input->post('bpjs_ks'),
        "npwp" => $this->input->post('npwp'),
        "basic_id" => $this->input->post('basic_id')
      ];

      $que = $this->con->get_secondary_admin($id_candidate);
      if ($que) {
        $allowance_premium = $this->input->post('allowance_premium');
        $allowance_others = $this->input->post('allowance_others');
        $placement_city = $this->input->post('placement_city');
        $placement_district = $this->input->post('placement_district');
        $type_bank = $this->input->post('type_bank');
        $account_number = $this->input->post('account_number');
        $name_of_bank = $this->input->post('name_of_bank');
        $bpjs_tk = $this->input->post('bpjs_tk');
        $bpjs_ks = $this->input->post('bpjs_ks');
        $npwp = $this->input->post('npwp');


        $this->db->set('allowance_premium', $allowance_premium);
        $this->db->set('allowance_others', $allowance_others);
        $this->db->set('placement_city', $placement_city);
        $this->db->set('placement_district', $placement_district);
        $this->db->set('type_bank', $type_bank);
        $this->db->set('account_number', $account_number);
        $this->db->set('name_of_bank', $name_of_bank);
        $this->db->set('bpjs_tk', $bpjs_tk);
        $this->db->set('bpjs_ks', $bpjs_ks);
        $this->db->set('npwp', $npwp);
        $this->db->where('basic_id', $this->input->post('basic_id'));
        $this->db->update('secondary_admin');

        $this->session->set_flashdata('msg', 'Data Bank Sudah Berhasil Di Edit');
        redirect('contract/detail_contract/' . $id_candidate);
      } else {
        $this->db->insert('secondary_admin', $data);
        $this->session->set_flashdata('msg', 'Data Bank Karyawan berhasil Ditambah');
        redirect('contract/detail_contract/' . $id_candidate);
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
      $this->load->view('detail_contract_view', $data);
      $this->load->view('Temp_admin/footer');
    } else {

      $data = [
        'name_emergency' => $this->input->post('name_emergency'),
        'phone_emergency' => $this->input->post('phone_emergency'),
        'relation_emergency' => $this->input->post('relation_emergency'),
        'basic_id' => $id_candidate
      ];

      $this->db->insert('emergency_contact', $data);
      $this->session->set_flashdata('msg', 'Data Emergency berhasil ditambah');
      redirect('contract/detail_contract/' . $id_candidate);
    }
  }

  public function addPkwtEmployee($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['pkwt'] = $this->db->get('pkwt_employee')->result_array();
    $data['list'] = $this->con->detailAll($id_candidate);
    $data['second'] = $this->con->detailSecond($id_candidate);
    $data['educate'] = $this->con->detailEducation($id_candidate);
    $data['exp'] = $this->con->detailExp($id_candidate);
    $data['basicadmin'] = $this->con->adminQuery($id_candidate);
    $data['secondadmin'] = $this->con->adminBank($id_candidate);
    $data['emergency'] = $this->con->emergencyContact($id_candidate);
    $data['detailEmergency'] = $this->con->detailEmergency($id_candidate);
    $data['pkwt'] = $this->con->pkwtEmployee($id_candidate);

    $validation = $this->form_validation;

    $validation->set_rules('pkwt_number', 'No PKWT', 'required|trim');
    $validation->set_rules('date_pkwt', 'Date PKWT', 'required|trim');
    $validation->set_rules('start_of_contract', 'StartOf PKWT', 'required|trim');
    $validation->set_rules('end_of_contract', 'EndOf PKWT', 'required|trim');
    $validation->set_rules('desc_pkwt', 'Desc PKWT', 'required|trim');

    if ($validation->run() == false) {
      $this->load->view('Temp_admin/header', $data);
      $this->load->view('Temp_admin/navbar', $data);
      $this->load->view('Temp_admin/sidebar', $data);
      $this->load->view('detail_contract_view', $data);
      $this->load->view('Temp_admin/footer');
    } else {

      $data = [
        'pkwt_number' => $this->input->post('pkwt_number'),
        'date_pkwt' => $this->input->post('date_pkwt'),
        'start_of_contract' => $this->input->post('start_of_contract'),
        'end_of_contract' => $this->input->post('end_of_contract'),
        'desc_pkwt' => $this->input->post('desc_pkwt'),
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
          redirect('contract/detail_contract/' . $id_candidate);
        } else {
          $this->session->set_flashdata('msg', 'Data PKWT gagal ditambah');
          redirect('contract/detail_contract/' . $id_candidate);
        }
      }
    }
  }

  //export ke dalam format excel
  public function export_excel_contract()
  {
    $data['title'] = "Karyawan Join " . date('d-F-Y');
    $data['actived'] = $this->con->quer();

    $this->load->view('export_contract', $data);
  }
}