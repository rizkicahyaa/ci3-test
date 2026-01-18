<?php

class Model_mahasiswa extends CI_Model {
    public function get_all() {
        return $this->db->get('users')->result();
    }

    public function insert($data) {
        return $this->db->insert('users', $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function update($id, $data) {
        return $this->db->update('users', $data, ['id' => $id]);
    }

    public function delete($id) {
        return $this->db->where('id', $id)->delete('users');
    }
}