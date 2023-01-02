<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reference extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('username')) {
      redirect('auth');
    }
    if ($this->session->userdata('level_id') != 3 && $this->session->userdata('level_id') != 2) {
      show_404();
    }
  }


  public function index()
  {
    $data['title'] = "Halaman Kandidat Referensi";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->model('Reference_model', 'ref');
    $data['candidate'] = $this->ref->getStatusTest();
    $data['exp'] = $this->ref->expIndex();
    $data['send'] = $this->ref->getStatusSend();
    $data['candi'] = $this->db->get('send_candidate')->row_array();

    $this->load->view('Temp_sourcing/header', $data);
    $this->load->view('Temp_sourcing/navbar', $data);
    $this->load->view('Temp_sourcing/sidebar', $data);
    $this->load->view('ref_index', $data);
    $this->load->view('Temp_sourcing/footer');
  }

  public function detailreferencecandidate($id_candidate)
  {
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    $this->load->model('reference_model', 'sour');
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
      $this->load->view('detail_reference', $data);
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
      redirect('reference');
    }
  }

  public function addsend_candidate_ref($id_candidate)
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
    $validation->set_rules('created_by', 'Created By', 'required');


    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('addsend_view_ref', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {

      $data = [
        'client' => $this->input->post('client'),
        'position' => $this->input->post('position'),
        'date_send' => $this->input->post('date_send'),
        'result_send' => $this->input->post('result_send'),
        'created_by' => $this->input->post('created_by'),
        'basic_id' => $id_candidate
      ];

      $this->db->insert('send_candidate', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Horee!</strong> Data kirim kandidat berhasil ditambah.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
      redirect('reference');
    }
  }
  public function update_status_ref($id)
  {
    $data['title'] = "Pengiriman kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['status'] = $this->db->get_where('send_candidate', ['id' => $id])->row_array();

    $validation = $this->form_validation;

    $validation->set_rules('result_send', 'Result', 'required|trim');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('edit_result_ref', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {
      $result_send = $this->input->post('result_send');

      $this->db->set('result_send', $result_send);
      $this->db->where('id', $this->input->post('id'));

      $this->db->update('send_candidate');
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Horee!</strong> Status berhasil di update .
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>');
      redirect('reference');
    }
  }

  public function contract_ref($id)
  {
    $data['title'] = "Pengiriman kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['status'] = $this->db->get_where('send_candidate', ['id' => $id])->row_array();

    $validation = $this->form_validation;

    $validation->set_rules('placement', 'Placement', 'required|trim');
    $validation->set_rules('salary', 'Salary', 'required|trim|numeric');
    $validation->set_rules('start_date', 'Start_date', 'required|trim');
    $validation->set_rules('end_date', 'End_date', 'required|trim');
    $validation->set_rules('desc_send', 'Description');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('form_contract_ref', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {
      $placement = $this->input->post('placement');
      $salary = $this->input->post('salary');
      $start_date = $this->input->post('start_date');
      $end_date = $this->input->post('end_date');
      $desc_send = $this->input->post('desc_send');

      $this->db->set('placement', $placement);
      $this->db->set('salary', $salary);
      $this->db->set('start_date', $start_date);
      $this->db->set('end_date', $end_date);
      $this->db->set('desc_send', $desc_send);
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('send_candidate');
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Horee!</strong> Contract berhasil dibuat .
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>');
      redirect('reference');
    }
  }

  public function add_psikogram_many($id_candidate)
  {
    $data['title'] = "Upload Psikogram Kandidat Baru";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();

    $this->load->view('Temp_sourcing/header', $data);
    $this->load->view('Temp_sourcing/navbar', $data);
    $this->load->view('Temp_sourcing/sidebar', $data);
    $this->load->view('home_upload_psikogram_ref', $data);
    $this->load->view('Temp_sourcing/footer');
  }



  public function psikogram_one($id_candidate)
  {
    $data['title'] = "Upload Psikogram Satu";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();

    $validation = $this->form_validation;

    $validation->set_rules('fullname', 'Name', 'required');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('add_psikogram_one_ref', $data);
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
            <strong>Horee!</strong> Upload PDF psikogram satu berhasil ditambah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
      redirect('reference/add_psikogram_many/' . $id_candidate);
    }
  }

  public function psikogram_two($id_candidate)
  {
    $data['title'] = "Upload Psikogram Satu";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();

    $validation = $this->form_validation;

    $validation->set_rules('fullname', 'Name', 'required');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('add_psikogram_two_ref', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {
      $fullname = $this->input->post('fullname');

      $upload_psiko = $_FILES['psikogram_two']['name'];

      if ($upload_psiko) {
        $config['allowed_types'] = 'pdf';
        $config['max_size']     = 0;
        $config['upload_path'] = './assets/uploads/psikogram/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('psikogram_two')) {
          // $old_image = $data['blog']['image'];
          // if ($old_image != 'default.jpg') {
          //   unlink(FCPATH . 'frontend/assets/img/blog/' . $old_image);
          // }

          $psiko = $this->upload->data('file_name');
          $this->db->set('psikogram_two', $psiko);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->db->set('fullname', $fullname);
      $this->db->where('id_candidate', $this->input->post('id_candidate'));
      $this->db->update('candidate_basic');
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Horee!</strong> Upload PDF psikogram dua berhasil ditambah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
      redirect('reference/add_psikogram_many/' . $id_candidate);
    }
  }
  public function psikogram_three($id_candidate)
  {
    $data['title'] = "Upload Psikogram Satu";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['basic'] = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();

    $validation = $this->form_validation;

    $validation->set_rules('fullname', 'Name', 'required');

    if ($validation->run() == false) {
      $this->load->view('Temp_sourcing/header', $data);
      $this->load->view('Temp_sourcing/navbar', $data);
      $this->load->view('Temp_sourcing/sidebar', $data);
      $this->load->view('add_psikogram_three_ref', $data);
      $this->load->view('Temp_sourcing/footer');
    } else {
      $fullname = $this->input->post('fullname');

      $upload_psiko = $_FILES['psikogram_three']['name'];

      if ($upload_psiko) {
        $config['allowed_types'] = 'pdf';
        $config['max_size']     = 0;
        $config['upload_path'] = './assets/uploads/psikogram/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('psikogram_three')) {
          // $old_image = $data['blog']['image'];
          // if ($old_image != 'default.jpg') {
          //   unlink(FCPATH . 'frontend/assets/img/blog/' . $old_image);
          // }

          $psiko = $this->upload->data('file_name');
          $this->db->set('psikogram_three', $psiko);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->db->set('fullname', $fullname);
      $this->db->where('id_candidate', $this->input->post('id_candidate'));
      $this->db->update('candidate_basic');
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Horee!</strong> Upload PDF psikogram tiga berhasil ditambah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
      redirect('reference/add_psikogram_many/' . $id_candidate);
    }
  }
}