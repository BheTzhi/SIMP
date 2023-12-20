<?php

class Auth_model extends CI_Model
{
    public function prosesLogin()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $user = $this->db->get_where('pegawai', ['username' => $username])->row_array();
        $user2 = $this->db->get_where('pedagang', ['username' => $username])->row_array();

        if ($user) {

            if ($user['password'] == $password) {

                $data = [
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                ];

                $this->session->set_userdata($data);

                redirect('dashboard');
            } else {

                $this->session->set_flashdata('pesan2', '<div class="alert alert-danger" role="alert">Password Salah</div>');

                redirect('auth');
            }
        } elseif ($user2) {

            if ($user2['password'] == $password) {

                $data = [
                    'username' => $user2['username'],
                    'role_id' => $user2['role_id'],
                ];

                $this->session->set_userdata($data);

                redirect('dashboard');
            } else {

                $this->session->set_flashdata('pesan2', '<div class="alert alert-danger" role="alert">Password Salah</div>');

                redirect('auth');
            }
        } else {

            $this->session->set_flashdata('pesan2', '<div class="alert alert-danger" role="alert">User berlum terdaftar</div>');

            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        redirect('auth');
    }

    public function apiLogin($username, $password)
    {
        $query = $this->db->get_where('user', ['username' => $username, md5($password)]);

        return $query->row();
    }
}
