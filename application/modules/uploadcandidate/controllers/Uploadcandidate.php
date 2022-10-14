<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uploadcandidate extends CI_Controller
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
    $this->load->model('Upload_model', 'upmo');
  }

  public function index()
  {
    $data['title'] = "Halaman Upload Gambar & File";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $data['candidate'] = $this->upmo->getDataDesc();
    $this->load->view('Temp_sourcing/header', $data);
    $this->load->view('Temp_sourcing/navbar', $data);
    $this->load->view('Temp_sourcing/sidebar', $data);
    $this->load->view('upload_view', $data);
    $this->load->view('Temp_sourcing/footer');
  }

  public function add_image($id_candidate)
  {
    $data['title'] = "Upload Gambar Kandidat Baru";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();

    $validation = $this->form_validation;

    $validation->set_rules('fullname', 'Name', 'required');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('adding_image', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {

      $fullname = $this->input->post('fullname');

      $upload_image = $_FILES['image']['name'];

      if ($upload_image) {
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']     = 0;
        $config['upload_path'] = './assets/uploads/image/candidate-image/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
          // $old_image = $data['blog']['image'];
          // if ($old_image != 'default.jpg') {
          //   unlink(FCPATH . 'frontend/assets/img/blog/' . $old_image);
          // }

          $new_image = $this->upload->data('file_name');
          $this->db->set('image', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->db->set('fullname', $fullname);
      $this->db->where('id_candidate', $this->input->post('id_candidate'));
      $this->db->update('candidate_basic');
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Foto berhadil ditambah.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
      redirect('Uploadcandidate');
    }
  }

  public function add_psikogram($id_candidate)
  {
    $data['title'] = "Upload Psikogram Kandidat Baru";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();

    $validation = $this->form_validation;

    $validation->set_rules('fullname', 'Name', 'required');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('adding_psikogram', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {
      $fullname = $this->input->post('fullname');

      $upload_psiko = $_FILES['psikogram']['name'];

      if ($upload_psiko) {
        $config['allowed_types'] = 'pdf';
        $config['max_size']     = 0;
        $config['upload_path'] = './assets/uploads/psikogram/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('psikogram')) {
          // $old_image = $data['blog']['image'];
          // if ($old_image != 'default.jpg') {
          //   unlink(FCPATH . 'frontend/assets/img/blog/' . $old_image);
          // }

          $psiko = $this->upload->data('file_name');
          $this->db->set('psikogram', $psiko);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->db->set('fullname', $fullname);
      $this->db->where('id_candidate', $this->input->post('id_candidate'));
      $this->db->update('candidate_basic');
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Upload PDF psikogram berhasil ditambah.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
      redirect('Uploadcandidate');
    }
  }

  public function add_interview($id_candidate)
  {
    $data['title'] = "Upload Interview Kandidat Baru";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();

    $validation = $this->form_validation;

    $validation->set_rules('fullname', 'Name', 'required');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('adding_interview', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {
      $fullname = $this->input->post('fullname');

      $upload_psiko = $_FILES['interview']['name'];

      if ($upload_psiko) {
        $config['allowed_types'] = 'pdf';
        $config['max_size']     = 0;
        $config['upload_path'] = './assets/uploads/interview/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('interview')) {
          // $old_image = $data['blog']['image'];
          // if ($old_image != 'default.jpg') {
          //   unlink(FCPATH . 'frontend/assets/img/blog/' . $old_image);
          // }

          $inter = $this->upload->data('file_name');
          $this->db->set('interview', $inter);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->db->set('fullname', $fullname);
      $this->db->where('id_candidate', $this->input->post('id_candidate'));
      $this->db->update('candidate_basic');
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Upload Interview berhasil ditambah.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
      redirect('Uploadcandidate');
    }
  }
}