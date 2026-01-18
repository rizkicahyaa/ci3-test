<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_mahasiswa");
	}

	public function index()
	{
		$data['mahasiswa'] = $this->Model_mahasiswa->get_all();
		$this->load->view('index', $data);
	}

	public function add() {
		if ($this->input->post()) {
			$this->Model_mahasiswa->insert($this->input->post());
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

}
