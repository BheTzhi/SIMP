<?php


class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Pembayaran_model', 'pembayaran');
    }

    public function index()
    {
        $data['title'] = 'Pembayaran Manajemen';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $data['pembayaran'] = $this->pembayaran->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pembayaran/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $this->pembayaran->add();
    }

    public function edit($id)
    {
        $id = decrypt_url($id);

        $this->pembayaran->edit($id);
    }
    public function delete($id)
    {
        $id = decrypt_url($id);

        $this->pembayaran->delete($id);
    }
}
