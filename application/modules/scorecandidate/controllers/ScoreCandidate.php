<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScoreCandidate extends CI_Controller
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
    $this->load->model('score_model', 'score');
  }
  public function index()
  {
    $data['title'] = "Halaman Penilaian";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->model('score_model', 'score');

    $data['candidate'] = $this->score->getCandidateDesc();
    $data['count_stat'] = $this->score->countStatus();
    $this->load->view('Temp_sourcing/header', $data);
    $this->load->view('Temp_sourcing/navbar', $data);
    $this->load->view('Temp_sourcing/sidebar', $data);
    $this->load->view('score_view', $data);
    $this->load->view('Temp_sourcing/footer');
  }

  public function score_candidate($id_candidate)
  {
    $data['title'] = "Penilaian Kandidat Baru";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['list'] = $this->db->get('candidate_secondary')->row_array();
    $this->load->model('Score_model', 'score');

    $validation = $this->form_validation;

    $validation->set_rules('regis_num_candidate', 'Candidate Number');
    $validation->set_rules('regis_num_resident', 'Resident Number');
    $validation->set_rules('email', 'Email');
    $validation->set_rules('marital_status', 'Marital Status');
    $validation->set_rules('tall', 'Tall');
    $validation->set_rules('weight', 'Weight');
    $validation->set_rules('postal_code', 'Gender');
    $validation->set_rules('religion', 'Religion');
    $validation->set_rules('certificate', 'Certificate');
    $validation->set_rules('validity_period', 'Validity Period');
    $validation->set_rules('status_test', 'Status Test', 'required');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('score_candidate_view', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {

      $data = [
        'regis_num_candidate' => $this->input->post('regis_num_candidate'),
        'regis_num_resident' => $this->input->post('regis_num_resident'),
        'email' => htmlspecialchars($this->input->post('email')),
        'marital_status' => $this->input->post('marital_status'),
        'tall' => htmlspecialchars($this->input->post('tall')),
        'status_test' => $this->input->post('status_test'),
        'postal_code' => $this->input->post('postal_code'),
        'weight' => $this->input->post('weight'),
        'religion' => $this->input->post('religion'),
        'certificate' => $this->input->post('certificate'),
        'validity_period' => $this->input->post('validity_period'),
        'basic_id' => $id_candidate
      ];

      $mod = $this->score->checkDataCandidate($data['basic_id']);
      if ($mod) {
        $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Opps!</strong> Data kandidat sudah dilakukan penilaian.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
        redirect('scorecandidate');
      } else {
        $this->db->insert('candidate_secondary', $data);

        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Horee!</strong> Data kandidat berhasil dilakukan penilaian.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('scorecandidate');
      }
    }
  }

  public function update_test($id_candidate)
  {
    $data['title'] = "Penjadwalan Kandidat Baru";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['list'] = $this->db->get('candidate_secondary')->result_array();

    $validation = $this->form_validation;

    $validation->set_rules('test_two', 'Test Two', 'required');
    $validation->set_rules('test_three', 'Test Three');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('date_of_test', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {
      $test_two = $this->input->post('test_two');
      $test_three = $this->input->post('test_three');

      if ($test_three != null) {
        $this->db->set('test_three', $test_three);
      } else {
        $this->db->set('test_two', $test_two);

        $this->db->where('id_candidate', $this->input->post('id_candidate'));
        $this->db->update('candidate_basic');
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Horee!</strong> Jadwal terbaru berhasil di update.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('scorecandidate');
      }
    }
  }

  public function editStatus($basic_id)
  {
    $data['title'] = "Update Status Baru";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get_where('candidate_secondary', ['basic_id' => $basic_id])->row_array();



    $validation = $this->form_validation;
    $validation->set_rules('status_test', 'Status Test', 'required');

    if ($validation->run() == false) {
      if ($basic_id == null || $data['basic']['status_test'] == null) {
        $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Oopss!</strong> Data kandidat belum dinilai.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
        redirect('scorecandidate');
      } else {
        $this->load->view('Temp_sourcing/header', $data);
        $this->load->view('Temp_sourcing/navbar', $data);
        $this->load->view('Temp_sourcing/sidebar', $data);
        $this->load->view('edit_status', $data);
        $this->load->view('Temp_sourcing/footer');
      }
    } else {
      $status = $this->input->post('status_test');

      $this->db->set('status_test', $status);
      $this->db->where('basic_id', $this->input->post('basic_id'));
      $this->db->update('candidate_secondary');
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Horee!</strong> Status terbaru berhasil di update.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
      redirect('scorecandidate');
    }
  }

  public function getDataScore()
  {
    // header('Content-Type: application/json');

    $results = $this->score->getDataTable();

    $data = [];
    $no = $_POST['start'];
    foreach ($results as $result) {
      $row = array();
      $row[] = ++$no;
      $row[] = $result->fullname;
      $row[] = $result->domicile;
      $row[] = $result->last_education;
      $row[] = $result->test_one != null && $result->test_two != null ?
        date('d-M-Y', strtotime($result->test_two)) : ($result->test_one != null
          && $result->test_two != null &&
          $result->test_three != null ? $result->test_three : $result->test_one);
      $row[] =
        $result->status_test == 'Lulus' ?
        '<span class="badge badge-pill badge-success">Lulus</span>' : ($result->status_test == 'Tidak Lulus' ?
          '<span class="badge badge-pill badge-danger">Tidak Lulus</span>' : ($result->status_test == 'Referensi' ?
            '<span class="badge badge-pill badge-info">Referensi</span>' : ($result->status_test == 'Tidak Hadir' ?
              '<span class="badge badge-pill badge-warning">Tidak Hadir</span>' : '')));
      $row[] = '
      <a href="' . base_url('scorecandidate/score_candidate/') . $result->id_candidate . '"
class="badge bg-gradient-danger text-light"><i class="fas fa-fw fa-pen"></i> Nilai</a><br>
<a href="' . base_url('scorecandidate/update_test/') . $result->id_candidate . '"
                        class="badge bg-gradient-info text-light"><i class="fas fa-fw fa-calendar-alt"></i> Update
                        Jadwal</a>
                        <a href="' . base_url('scorecandidate/editStatus/') . $result->id_candidate . '"
                        class="badge bg-gradient-warning text-dark"><i class="fas fa-fw fa-user-edit"></i> Edit
                        Status</a>';
      $data[] = $row;
    }

    $output = array(
      'draw' => $_POST['draw'],
      'recordsTotal' => $this->score->count_all_data(),
      'recordsFiltered' => $this->score->count_filtered_data(),
      'data' => $data
    );

    $this->output->set_output(json_encode($output));
  }
}