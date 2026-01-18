<?php

class Model_mahasiswa extends CI_Model {
    public function get_all() {
        return $this->db->get('users')->result();
    }

    public function insert($data) {
        return $this->db->insert('users', $data);
    }
}