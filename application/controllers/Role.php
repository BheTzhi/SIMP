<?php

class Role extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Role_model', 'role');
        $this->load->model('Menu_model', 'menu');
    }

    public function index()
    {
        $data['title'] = 'Role Manajemen';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $data['role'] = $this->role->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('role/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $this->role->add();
    }

    public function edit($id)
    {
        $id = decrypt_url($id);
        $this->role->edit($id);
    }

    public function delet($id)
    {
        $id = decrypt_url($id);
        $this->role->delet($id);
    }

    public function roleakses($id)
    {
        $id = decrypt_url($id);

        $data['title'] = 'Role Manajemen';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $data['role'] = $this->role->getById($id);
        $data['menu'] = $this->menu->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('role/akses', $data);
        $this->load->view('templates/footer', $data);
    }

    public function changeakses()
    {
        $this->role->changeAkses();
    }
}
