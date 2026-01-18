<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Model_user $Model_user
 */
class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_user');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function login()
    {
        if ($this->session->userdata('login')) {
            redirect('mahasiswa');
        }

        if ($this->input->post()) {
            $email    = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->Model_user->get_by_email($email);

            if ($user && md5($password) === $user->password) {
                $this->session->set_userdata([
                    'login'   => TRUE,
                    'id' => $user->id,
                    'nama'    => $user->name,
                    'email'   => $user->email
                ]);
                redirect('mahasiswa');
            } else {
                $this->session->set_flashdata('error', 'Email atau Password salah');
            }
        }

        $this->load->view('login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
