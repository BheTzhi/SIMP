<?php

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Profile_model', 'profile');
        $this->load->model('Pasar_model', 'pasar');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Profile';
        $data['role'] = $this->session->userdata('role_id');
        if ($data['role'] != 4) :
            $this->db->select('a.foto, a.nama, a.nip, a.username, a.date_join');
            $this->db->join('user_role b', 'b.id = a.role_id');
            $data['user'] = $this->db->get_where('pegawai a', ['username' => $this->session->userdata('username')])->row_array();
        else :
            $data['user'] = $this->db->get_where('pedagang', ['username' => $this->session->userdata('username')])->row_array();
        endif;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['role'] = $this->session->userdata('role_id');
        if ($data['role'] != 4) :
            $this->db->select('a.id, a.foto, a.nama, a.nip, a.npwp, a.username, a.date_join, b.role');
            $this->db->join('user_role b', 'b.id = a.role_id');
            $data['user'] = $this->db->get_where('pegawai a', ['username' => $this->session->userdata('username')])->row_array();
        else :
            $data['user'] = $this->db->get_where('pedagang', ['username' => $this->session->userdata('username')])->row_array();
        endif;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('profile/edit', $data);
        $this->load->view('templates/footer', $data);
    }

    public function password()
    {
        $data['title'] = 'Edit Password';

        $data['role'] = $this->session->userdata('role_id');
        if ($data['role'] != 4) :
            $this->db->select('a.foto, a.nama, a.nip, a.username, a.date_join');
            $this->db->join('user_role b', 'b.id = a.role_id');
            $data['user'] = $this->db->get_where('pegawai a', ['username' => $this->session->userdata('username')])->row_array();
        else :
            $data['user'] = $this->db->get_where('pedagang', ['username' => $this->session->userdata('username')])->row_array();
        endif;

        $this->form_validation->set_rules('lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('baru', 'Password Baru', 'required|trim|min_length[3]|matches[rbaru]', [
            'matches' => 'Password tidak sama',
            'min_length' => 'Password terlalu pendek',

        ]);

        $this->form_validation->set_rules('rbaru', 'Confirm New Password', 'required|trim|matches[baru]');

        if ($this->form_validation->run() == false) :
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('profile/password', $data);
            $this->load->view('templates/footer', $data);
        else :
            $this->profile->gantipassword();
        endif;
    }

    public function ubah($id)
    {
        $id = decrypt_url($id);
        $this->profile->edit($id);
    }

    public function kios()
    {
        $data['title'] = 'Kios';
        $data['role'] = $this->session->userdata('role_id');
        if ($data['role'] != 4) :
            $this->db->select('a.foto, a.nama, a.nip, a.username, a.date_join');
            $this->db->join('user_role b', 'b.id = a.role_id');
            $data['user'] = $this->db->get_where('pegawai a', ['username' => $this->session->userdata('username')])->row_array();
        else :
            $data['user'] = $this->db->get_where('pedagang', ['username' => $this->session->userdata('username')])->row_array();
        endif;

        $data['kios'] = $this->pasar->getKiosByPedagang($data['user']['id']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('profile/kiossaya', $data);
        $this->load->view('templates/footer', $data);
    }
}
