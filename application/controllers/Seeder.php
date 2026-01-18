<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seeder extends CI_Controller {

    public function index()
    {
        $this->load->database();
        
        $email = 'admin@admin.com';
        $check = $this->db->get_where('users', ['email' => $email])->row();

        if ($check) {
            // Update password to MD5 if user exists (fix previous password_hash)
            $this->db->where('email', $email);
            $this->db->update('users', ['password' => md5('password')]);
            echo "User {$email} sudah ada via update password.";
        } else {
            $data = [
                'name' => 'Admin System',
                'email' => $email,
                'jurusan' => 'Teknik Informatika',
                'password' => md5('password')
            ];

            if ($this->db->insert('users', $data)) {
                echo "User berhasil dibuat.<br>";
                echo "Email: $email<br>";
                echo "Pass: password";
            } else {
                echo "Gagal membuat user.";
            }
        }
    }
}
