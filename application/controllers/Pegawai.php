<?php


class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Role_model', 'role');
        $this->load->model('Pegawai_model', 'pegawai');
    }

    public function index()
    {
        $data['title'] = 'Pegawai Manajemen';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->order_by('role', 'asc');
        $this->db->where('role != "Admin Master"');
        $this->db->where('role != "Pedagang"');
        $data['role'] = $this->role->get();

        $this->db->where('b.role != "Admin Master"');
        $data['pegawai'] = $this->pegawai->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $this->pegawai->add();
    }

    public function edit($id)
    {
        $id = decrypt_url($id);
        $this->pegawai->edit($id);
    }

    public function delete($id)
    {
        $id = decrypt_url($id);

        $this->pegawai->delete($id);
    }
}
