<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;


class Sourcing extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('username')) {
      redirect('auth');
    }
    if ($this->session->userdata('level_id') != 2) {
      show_404();
    }
    $this->load->model('Sourcing_model', 'sour');
  }

  public function index()
  {
    $data['title'] = "Data Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $this->load->model('Sourcing_model', 'sour');
    // $data['candidate'] = $this->sour->getTestDate();
    $data['candidate'] = $this->sour->getCandidateDesc();
    $this->load->view('Temp_sourcing/header', $data);
    $this->load->view('Temp_sourcing/navbar', $data);
    $this->load->view('Temp_sourcing/sidebar', $data);
    $this->load->view('index', $data);
    $this->load->view('Temp_sourcing/footer');
  }

  public function addNewCandidate()
  {
    $data['title'] = "Tambah Kandidat Baru";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $data['list'] = $this->db->get('candidate_basic')->result_array();
    // $data['list'] = $this->sour->getTestDate();

    $validation = $this->form_validation;

    $validation->set_rules('fullname', 'Full Name', 'required|trim');
    $validation->set_rules('phone_number', 'Phone Number', 'required|trim|numeric|min_length[10]');
    $validation->set_rules('place_of_birth', 'Place Birth', 'required|trim');
    $validation->set_rules('date_of_birth', 'Date Birth', 'required');
    $validation->set_rules('domicile', 'Domicile', 'required|trim');
    $validation->set_rules('last_education', 'Last Education', 'required');
    $validation->set_rules('gender', 'Gender', 'required');
    $validation->set_rules('test_one', 'Test', 'required');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('addNewCandidate', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {

      $data = [
        'fullname' => htmlspecialchars($this->input->post('fullname')),
        'phone_number' => $this->input->post('phone_number'),
        'date_of_birth' => $this->input->post('date_of_birth'),
        'place_of_birth' => htmlspecialchars($this->input->post('place_of_birth')),
        'domicile' => htmlspecialchars($this->input->post('domicile')),
        'last_education' => $this->input->post('last_education'),
        'gender' => $this->input->post('gender'),
        'test_one' => $this->input->post('test_one')

      ];
      $mod = $this->sour->checkDataCandidate($data['fullname'], $data['date_of_birth']);
      if ($mod) {

        $this->session->set_flashdata('err', 'Data kandidat sudah terdaftar.');
        redirect('sourcing/addNewCandidate');
      } else {
        $this->db->insert('candidate_basic', $data);

        $this->session->set_flashdata('msg', 'Data Kandidat Berhasil Ditambah');
        redirect('sourcing/addNewCandidate');
      }
    }
  }

  public function upload_candidate()
  {
    $config['upload_path']    = "./assets/candidate-upload/";
    $config['allowed_types']  = "xlsx|xls";
    $config['max_size']       = 0;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('importexcel')) {
      $error = array('error' => $this->upload->display_errors());
      $this->session->set_flashdata('msg', $error);
    } else {

      // $mod = $this->sour->checkDataCandidate($data['fullname'], $data['date_of_birth']);

      $file = $this->upload->data();
      $reader = ReaderEntityFactory::createXLSXReader();

      $reader->open('assets/candidate-upload/' . $file['file_name']);

      foreach ($reader->getSheetIterator() as $sheet) {

        $numrow = 1;
        foreach ($sheet->getRowIterator() as $row) {

          if ($numrow > 1) {
            $candidate_basic = [
              'fullname' => $row->getCellAtIndex(0),
              'phone_number' => $row->getCellAtIndex(1),
              'place_of_birth' => $row->getCellAtIndex(2),
              'date_of_birth' => $row->getCellAtIndex(3),
              'domicile' => $row->getCellAtIndex(4),
              'last_education' => $row->getCellAtIndex(5),
              'gender' => $row->getCellAtIndex(6),
              'test_one' => $row->getCellAtIndex(7)
            ];
            $mod = $this->sour->checkDataCandidate($candidate_basic['fullname'], $candidate_basic['date_of_birth']);
            if ($mod) {
              $this->session->set_flashdata('err', 'Data kandidat sudah terdaftar.');
              redirect('sourcing');
            }

            $this->sour->importCandidate($candidate_basic);
          }
          $numrow++;
        }
        $reader->close();
        $this->session->set_flashdata('msg', 'Upload Data kandidat berhasil ditambah');
        redirect('sourcing');
      }
    }
  }

  public function detailcandidate($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $this->load->model('sourcing_model', 'sour');
    $data['list'] = $this->sour->detailAll($id_candidate);
    $data['second'] = $this->sour->detailSecond($id_candidate);
    $data['educate'] = $this->sour->detailEducation($id_candidate);
    $data['exp'] = $this->sour->detailExp($id_candidate);

    $this->load->view('Temp_sourcing/header', $data);
    $this->load->view('Temp_sourcing/navbar', $data);
    $this->load->view('Temp_sourcing/sidebar', $data);
    $this->load->view('detail_candidate', $data);
    $this->load->view('Temp_sourcing/footer');
  }

  public function getDataSour()
  {
    header('Content-Type: application/json');
    $results = $this->sour->getDataTable();

    $data = [];
    $no = $_POST['start'];
    foreach ($results as $result) {
      $row = array();
      $row[] = ++$no;
      $row[] = $result->fullname;
      $row[] = $result->domicile;
      $row[] = $result->last_education;
      $row[] = date('d-M-Y', strtotime($result->test_one));
      $row[] = date('d-M-Y', strtotime($result->test_two));
      $row[] = $result->test_three;
      $row[] = '<a href="' . base_url('sourcing/detailcandidate/') . $result->id_candidate . '"
      class="badge bg-warning">Detail <i class="fas fa-fw fa-info-circle"></i> </a>';
      $data[] = $row;
    }


    $output = array(
      'draw' => $_POST['draw'],
      'recordsTotal' => $this->sour->count_all_data(),
      'recordsFiltered' => $this->sour->count_filtered_data(),
      'data' => $data
    );

    $this->output->set_content_type('application/json')->set_output(json_encode($output));
  }
}