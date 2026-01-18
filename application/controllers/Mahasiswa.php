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


}
