<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Graduated extends CI_Controller
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
  }

  public function index()
  {
    $data['title'] = "Halaman Kandidat Lulus";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->model('Graduate_model', 'grad');
    $data['candidate'] = $this->grad->getStatusTest();
    $data['exp'] = $this->grad->expIndex();
    $data['send'] = $this->grad->getStatusSend();
    $data['candi'] = $this->db->get('send_candidate')->row_array();

    $this->load->view('Temp_sourcing/header', $data);
    $this->load->view('Temp_sourcing/navbar', $data);
    $this->load->view('Temp_sourcing/sidebar', $data);
    $this->load->view('grad_index', $data);
    $this->load->view('Temp_sourcing/footer');
  }

  public function detailgraduatecandidate($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $this->load->model('graduate_model', 'sour');
    $data['list'] = $this->sour->detailAll($id_candidate);
    $data['second'] = $this->sour->detailSecond($id_candidate);
    $data['educate'] = $this->sour->detailEducation($id_candidate);
    $data['exp'] = $this->sour->detailExp($id_candidate);

    $validation = $this->form_validation;

    $validation->set_rules('note_recommend', 'Note', 'required');


    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('detail_graduate', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {
      $note = $this->input->post('note_recommend');

      $this->db->set('note_recommend', $note);
      $this->db->where('id_candidate', $this->input->post('id_candidate'));
      $this->db->update('candidate_basic');
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Horee!</strong> Note rekomendasi berhasil ditambah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('graduated');
    }
  }

  public function addsend_candidate($id_candidate)
  {
    $data['title'] = "Pengiriman kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $data['list'] = $this->db->get('send_candidate')->result_array();

    $validation = $this->form_validation;

    $validation->set_rules('client', 'Client', 'required|trim');
    $validation->set_rules('position', 'Position', 'required|trim');
    $validation->set_rules('date_send', 'Date Send', 'required|trim');
    $validation->set_rules('result_send', 'Result Send', 'required|trim');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('addsend_view', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {

      $data = [
        'client' => $this->input->post('client'),
        'position' => $this->input->post('position'),
        'date_send' => $this->input->post('date_send'),
        'result_send' => $this->input->post('result_send'),
        'basic_id' => $id_candidate
      ];

      $this->db->insert('send_candidate', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Horee!</strong> Data kirim kandidat berhasil ditambah.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
      redirect('graduated/addsend_candidate/' . $id_candidate);
    }
  }

  public function editStatusCandidateSend($basic_id)
  {
    $data['title'] = "Halaman Kandidat Lulus";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['candi'] = $this->db->get_where('send_candidate', ['basic_id' => $basic_id])->row_array();

    $validation = $this->form_validation;

    $validation->set_rules('result_send', 'Result', 'required');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('grad_index', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {
      $res = $this->input->post('result_send');

      $this->db->set('result_send', $res);
      $this->db->where('basic_id', $this->input->post('basic_id'));
      $this->db->update('send_candidate');
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Horeee!</strong> Hasil terbaru berhasil di update.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
      redirect('graduated');
    }
  }
}