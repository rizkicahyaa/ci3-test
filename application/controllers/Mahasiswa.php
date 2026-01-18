<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Model_mahasiswa $Model_mahasiswa
 */

class Mahasiswa extends CI_Controller {	
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('login')) {
			redirect('auth/login');
		}

		$this->load->model("Model_mahasiswa");
	}

	public function index()
	{
		$data['mahasiswa'] = $this->Model_mahasiswa->get_all();
		$this->load->view('index', $data);
	}

	public function add() {
		if ($this->input->post()) {
			$data = $this->input->post();
			// Set default password '123456' if not provided, or hash the provided one
			$raw_password = $this->input->post('password') ? $this->input->post('password') : '123456';
			$data['password'] = md5($raw_password);
			
			$this->Model_mahasiswa->insert($data);
			redirect('');
		}

		$this->load->view('tambah');
	}

	public function edit($id)
    {
        if ($this->input->post()) {
            $data = [
                'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
                'jurusan' => $this->input->post('jurusan')
            ];
            $this->Model_mahasiswa->update($id, $data);
            redirect('mahasiswa');
        }

        $data['mhs'] = $this->Model_mahasiswa->get_by_id($id);
        $this->load->view('edit', $data);
    }

	public function delete($id)
    {
        $this->Model_mahasiswa->delete($id);
        redirect('mahasiswa');
    }
}
