<?php

class Hptd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Pasar_model', 'pasar');
    }

    public function index()
    {
        $data['title'] = 'Hptd';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->order_by('blok_id', 'ASC');
        $this->db->order_by('nomor', 'ASC');
        $data['kios'] = $this->pasar->getKiosAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('hptd/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function phn()
    {
        if ($this->input->post('add') != false) {
            $this->pasar->phn();
        } else {
            $this->pasar->phn();
        }
    }

    public function getlinks($val)
    {
        $url = 'https://silat.bekasikota.go.id/silat_v2/info/cek_status?no_permohonan=' . $val;  // Ganti dengan URL yang Anda inginkan

        $context = stream_context_create([
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
            ],
        ]);

        $html = file_get_contents($url, false, $context);

        if ($html !== false) {
            echo $html;
        } else {
            echo 'Gagal mengambil HTML.';
        }
    }
}
