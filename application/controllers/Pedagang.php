<?php

class Pedagang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->library('form_validation');
        $this->load->model('Pedagang_model', 'pedagang');
        $this->load->model('Pasar_model', 'pasar');
    }

    public function index()
    {
        $data['title'] = 'Data Pedagang';
        // $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->where('id != 0');
        $this->db->order_by('nama', 'asc');
        $data['pedagang'] = $this->pedagang->get();
        $data['role'] = $this->db->get_where('user_role', ['role' => 'Pedagang'])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pedagang/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($id)
    {
        $id = decrypt_url($id);
        $data['title'] = 'Detail Pedagang';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $data['pedagang'] = $this->pedagang->getById($id);
        $data['blok'] = $this->pasar->getBlok();
        $data['kios'] = $this->pasar->getKiosByPedagang($id);

        // $this->db->select_sum('harga - bayar', 'sisa');
        $query = "SELECT SUM(harga - bayar) as sisa FROM kios WHERE pedagang_id = $id";
        $data['sisa'] = $this->db->query($query)->row_array();

        $data['next'] = $this->pedagang->next($data['pedagang']['nama']);
        $data['prev'] = $this->pedagang->prev($data['pedagang']['nama']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pedagang/detail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $this->pedagang->add();
    }

    public function ubah($id)
    {
        $id = decrypt_url($id);

        $data['title'] = 'Detail Pedagang';
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();
        $data['role'] = $this->session->userdata('role_id');

        $data['pedagang'] = $this->pedagang->getById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pedagang/edit', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit($id)
    {
        $id = decrypt_url($id);
        $this->pedagang->edit($id);
    }

    public function delet($id)
    {
        $id = decrypt_url($id);
        $this->pedagang->delet($id);
    }

    public function getall()
    {
        echo json_encode($this->pedagang->get());
    }

    public function getkios($blok)
    {
        $this->db->where('status', 0);
        echo json_encode($this->pasar->getKiosByBlok($blok));
    }

    public function belikios($id)
    {
        $id = decrypt_url($id);

        $this->pasar->beliKios($id);
    }
}
