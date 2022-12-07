<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Head extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('username')) {
      redirect('auth');
    }
    if ($this->session->userdata('level_id') != 4) {
      show_404();
    }
    $this->load->model('Head_model', 'ref');
  }

  public function index()
  {
    $data['title'] = "Head Management Karyawan";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();


    $data['send'] = $this->ref->getStatusSend();
    $data['candi'] = $this->db->get('send_candidate')->row_array();
    $data['candidate'] = $this->ref->getAllBasSec();
    $data['list'] = $this->ref->basSend();

    $this->load->view('Temp_sourcing/header', $data);
    $this->load->view('Temp_sourcing/navbar', $data);
    $this->load->view('Temp_sourcing/sidebar', $data);
    $this->load->view('head_index', $data);
    $this->load->view('Temp_sourcing/footer', $data);
  }

  public function detailcandidate($id_candidate)
  {
    $data['title'] = "Head Management Karyawan";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['candidate'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $this->load->model('Head_model', 'sour');
    $data['list'] = $this->sour->detailAll($id_candidate);
    $data['second'] = $this->sour->detailSecond($id_candidate);
    $data['educate'] = $this->sour->detailEducation($id_candidate);
    $data['exp'] = $this->sour->detailExp($id_candidate);
    $data['send'] = $this->sour->detailContract($id_candidate);

    $this->load->view('Temp_sourcing/header', $data);
    $this->load->view('Temp_sourcing/navbar', $data);
    $this->load->view('Temp_sourcing/sidebar', $data);
    $this->load->view('detail_head', $data);
    $this->load->view('Temp_sourcing/footer');
  }

  public function approved($basic_id)
  {
    $data['title'] = "Approved";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['send'] = $this->db->get_where('send_candidate', ['basic_id' => $basic_id])->row_array();
    $this->load->model('Head_model', 'sour');
    $data['list'] = $this->sour->getAlls($basic_id);


    $validation = $this->form_validation;
    $validation->set_rules('confirm', 'Approve', 'required|trim');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('approved_view', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {
      $confirm = $this->input->post('confirm');

      $this->db->set('confirm', $confirm);
      $this->db->where('basic_id', $this->input->post('basic_id'));
      $this->db->update('send_candidate');
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Horee!</strong> Berhasil Approve. Dikirim ke Admin.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('head');
    }
  }
}