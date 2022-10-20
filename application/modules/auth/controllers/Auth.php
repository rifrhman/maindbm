<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = "Login";
    $this->load->view('login', $data);
  }

  public function login()
  {
    $username = htmlspecialchars($this->input->post('username'));
    $password = $this->input->post('password');

    $users = $this->db->get_where('users', ['username' => $username])->row_array();

    if ($users) {

      if (password_verify($password, $users['password'])) {

        $data = [
          'username' => $users['username'],
          'level_id' => $users['level_id']
        ];
        $this->session->set_userdata($data);

        if ($users['level_id'] == 1) {
          redirect('admin');
        } elseif ($users['level_id'] == 2) {
          redirect('sourcing');
        } elseif ($users['level_id'] == 3) {
          redirect('graduated');
        } elseif ($users['level_id'] == 4) {
          redirect('head');
        }
      } else {
        $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oops!</strong> Password salah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Maaf!</strong> Username tidak ditemukan.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('level_id');
    $this->session->set_flashdata('msg', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>Bye!</strong> Sampai ketemu lagi nanti.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>');
    redirect('auth');
  }
}