<?php

class Keuangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Pegawai_model', 'pegawai');
        $this->load->model('Role_model', 'role');
        $this->load->model('Keuangan_model', 'keuangan');
    }

    public function index()
    {
        $data['title'] = 'Data Keuangan';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->order_by('role', 'asc');
        $this->db->where('role != "Admin Master"');
        $this->db->where('role != "Pedagang"');
        $data['jabatan'] = $this->role->get();
        $data['potongan'] = $this->keuangan->getPotongan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('keuangan/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function earnging($id)
    {
        $id = decrypt_url($id);

        $this->keuangan->earnging($id);
    }

    public function addpotongan()
    {
        $this->keuangan->addPotongan();
    }

    public function editpotongan($id)
    {
        $id = decrypt_url($id);

        $this->keuangan->editPotongan($id);
    }

    public function delpotongan($id)
    {
        $id = decrypt_url($id);
        $this->keuangan->delPotongan($id);
    }

    public function gaji()
    {
        $data['title'] = 'Gaji Manajemen';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->order_by('role', 'asc');
        $this->db->where('role != "Admin Master"');
        $this->db->where('role != "Pedagang"');
        $data['jabatan'] = $this->role->get();


        $data['sak'] = $this->db->get_where('potongan', ['keterangan' => 'Sakit'])->row_array();
        $data['izi'] = $this->db->get_where('potongan', ['keterangan' => 'Izin'])->row_array();
        $data['alp'] = $this->db->get_where('potongan', ['keterangan' => 'Alpa'])->row_array();

        $data['bulan'] = $this->db->get('bulan')->result_array();

        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data['pegawai'] = $this->keuangan->gaji($bulan . $tahun);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('keuangan/gaji', $data);
        $this->load->view('templates/footer', $data);
    }

    public function cetak($id)
    {
        $id = decrypt_url($id);

        $data['title'] = 'Slip Gaji';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->order_by('role', 'asc');
        $this->db->where('role != "Admin Master"');
        $this->db->where('role != "Pedagang"');
        $data['jabatan'] = $this->role->get();

        $data['sak'] = $this->db->get_where('potongan', ['keterangan' => 'Sakit'])->row_array();
        $data['izi'] = $this->db->get_where('potongan', ['keterangan' => 'Izin'])->row_array();
        $data['alp'] = $this->db->get_where('potongan', ['keterangan' => 'Alpa'])->row_array();

        $data['bulan'] = $this->db->get('bulan')->result_array();

        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $this->db->where('a.id', $id);
        $data['pegawai'] = $this->keuangan->cetak($id);
        $this->load->view('keuangan/cetak2', $data);
    }
}
