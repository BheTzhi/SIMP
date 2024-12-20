<?php

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Menu_model', 'menu');
    }

    public function index()
    {
        $data['title'] = 'Menu Manajemen';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $data['menu'] = $this->menu->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $this->menu->add();
    }

    public function edit($id)
    {
        $id = decrypt_url($id);

        $this->menu->edit($id);
    }

    public function delet($id)
    {
        $id = decrypt_url($id);

        $this->menu->delet($id);
    }
}
