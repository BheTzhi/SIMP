<?php

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Pegawai_model', 'pegawai');
        $this->load->model('Pasar_model', 'pasar');
        $this->load->model('Retribusi_model', 'retribusi');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['role'] = $this->session->userdata('role_id');
        if ($data['role'] != 4) :
            $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();
        else :
            $data['user'] = $this->db->get_where('pedagang', ['username' => $this->session->userdata('username')])->row_array();
        endif;
        $data['pegawai'] = $this->pegawai->get();
        $data['pedagang'] = $this->db->get('pedagang')->result_array();
        $data['kios'] = $this->db->get('kios')->result_array();

        $this->db->where('status', 1);
        $data['laku'] = $this->db->get('kios')->result_array();

        $this->db->where('status', 0);
        $data['belumlaku'] = $this->db->get('kios')->result_array();

        $this->db->where('blok != "Utility"');
        $data['blok'] = $this->pasar->getBlok();

        $this->db->select_sum('harga', 'harga');
        $data['total'] = $this->db->get('kios')->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);

        if ($data['role'] == 10) :
            if ($this->input->get('bulan') != null) :
                $data['bulan'] = $this->db->get_where('bulan', ['id' => $this->input->get('bulan')])->row_array()['bulan'];
            endif;
            $data['bulans'] = $this->db->get('bulan')->result_array();
            $data['tahuns'] = $this->gettahun();

            $this->db->limit(10);
            $data['retribusi'] = $this->retribusi->getToDay()->result_array();
            $this->load->view('dashboard/pengelola', $data);
        else :
            $this->load->view('dashboard', $data);
        endif;

        $this->load->view('templates/footer', $data);
    }

    public function getbulan()
    {
        $this->db->select('SUBSTRING(bulantahun, 1, char_length(bulantahun) - 4) as bulan');
        $this->db->from('kwhbulan');
        $this->db->group_by('SUBSTRING(bulantahun, 1, char_length(bulantahun) - 4)');
        echo json_encode($this->db->get()->result_array());
    }

    public function gettahun()
    {
        $this->db->select('RIGHT(a.bulantahun, 4) as tahun');
        $this->db->from('kwhbulan a');
        $this->db->join('kios b', 'b.id = a.kios_id');
        $this->db->join('blok c', 'c.id = b.blok_id');
        $this->db->group_by('RIGHT(a.bulantahun, 4)');
        $a = $this->db->get()->result_array();

        return $a;
    }

    public function yValues()
    {
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $lantai = $_POST['lantai'];

        $this->db->select('count(a.status) as status');
        $this->db->from('kwhbulan a');
        $this->db->join('kios b', 'b.id=a.kios_id');
        $this->db->where('SUBSTRING(a.bulantahun, 1, char_length(a.bulantahun) - 4) =', $bulan);
        $this->db->where('RIGHT(a.bulantahun, 4) =', $tahun);
        $this->db->where('b.lantai', $lantai);
        $this->db->group_by('a.status');

        $result = $this->db->get()->result_array();

        if ($result == true) :
            echo json_encode(['status' => 1, 'result' => $result]);
        else :
            echo json_encode(['status' => 0, 'result' => 'Kosong']);
        endif;
    }

    public function yValuesAir()
    {
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $lantai = $_POST['lantai'];

        $this->db->select('count(a.status) as status');
        $this->db->from('wmeter a');
        $this->db->join('kios b', 'b.id=a.kios_id');
        $this->db->where('SUBSTRING(a.bulantahun, 1, char_length(a.bulantahun) - 4) =', $bulan);
        $this->db->where('RIGHT(a.bulantahun, 4) =', $tahun);
        $this->db->where('b.lantai', $lantai);
        $this->db->group_by('a.status');

        $result = $this->db->get()->result_array();

        if ($result == true) :
            echo json_encode(['status' => 1, 'result' => $result]);
        else :
            echo json_encode(['status' => 0, 'result' => 'Kosong']);
        endif;
    }
}
