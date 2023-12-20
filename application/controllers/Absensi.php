<?php

class Absensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Pegawai_model', 'pegawai');
        $this->load->model('Absensi_model', 'absensi');
    }

    public function index()
    {
        $data['title'] = 'Absen Manajemen';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $data['bulan'] = $this->db->get('bulan')->result_array();
        $data['pegawai'] = $this->pegawai->get();

        $data['bybulan'] = $this->absensi->get($this->input->post('bulan') . $this->input->post('tahun'));

        if ($this->input->post('simpan') != true) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('absensi/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->absensi->inputAbsen();
        }
    }

    public function inputabsen()
    {
        if ($_POST['cari'] != true) {
            $this->absensi->inputAbsen();
        }
    }

    public function cari($bulantahun)
    {
        echo json_encode($this->absensi->get($bulantahun));
    }

    public function harian()
    {
        $data['title'] = 'Absen Harian';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $data['bulan'] = $this->db->get('bulan')->result_array();
        $data['absensi'] = $this->absensi->harian();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('absensi/harian', $data);
        $this->load->view('templates/footer', $data);
    }

    public function masuk()
    {
        $data['title'] = 'Masuk';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $data['bulan'] = $this->db->get('bulan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('absensi/masuk', $data);
        $this->load->view('templates/footer', $data);
    }

    public function pulang()
    {
        $data['title'] = 'Pulang';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $data['bulan'] = $this->db->get('bulan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('absensi/pulang', $data);
        $this->load->view('templates/footer', $data);
    }

    public function izsak()
    {
        $data['title'] = 'Izin & Sakit';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $data['bulan'] = $this->db->get('bulan')->result_array();
        $data['pegawai'] = $this->pegawai->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('absensi/izsak', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getbynip($nip)
    {
        echo json_encode($this->pegawai->getByNip($nip));
    }

    public function inpmsk()
    {
        $this->absensi->inpMsk();
    }

    public function inpplg()
    {
        $this->absensi->inpPlg();
    }
}
